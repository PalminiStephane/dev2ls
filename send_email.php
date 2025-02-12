<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Protection CSRF
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
        $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        http_response_code(403);
        echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF token']);
        exit;
    }

    // Limitation des soumissions (5 minutes)
    if (isset($_SESSION['last_submission']) && 
        time() - $_SESSION['last_submission'] < 300) {
        http_response_code(429); // Too Many Requests
        echo json_encode(['status' => 'error', 'message' => 'Veuillez attendre 5 minutes avant de soumettre un nouveau message']);
        exit;
    }

    // Validation des données
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $service = strip_tags(trim($_POST["service"]));
    $budget = strip_tags(trim($_POST["budget"]));
    $message = strip_tags(trim($_POST["message"]));

    // Vérification des données requises
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Veuillez remplir tous les champs correctement']);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dev2ls13820@gmail.com'; // Remplacez par votre email Gmail
        $mail->Password   = 'bxghnysnchyozzqs'; // Remplacez par votre mot de passe d'application
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // Destinataires
        $mail->setFrom($email, $name);
        $mail->addAddress('dev2ls13820@gmail.com', 'Dev2ls');
        $mail->addReplyTo($email, $name);

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau contact de ' . $name;
        
        // Corps du message
        $messageBody = "
            <h2>Nouveau message de contact</h2>
            <p><strong>Nom:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Service:</strong> {$service}</p>
            <p><strong>Budget:</strong> {$budget}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";
        
        $mail->Body = $messageBody;
        $mail->AltBody = strip_tags($messageBody); // Version texte pour les clients qui ne supportent pas l'HTML

        $mail->send();

        // Régénérer le token CSRF après un envoi réussi
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        
        // Enregistrer l'heure de soumission
        $_SESSION['last_submission'] = time();

        echo json_encode([
            'status' => 'success', 
            'message' => 'Votre message a été envoyé avec succès'
        ]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 'error', 
            'message' => "Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}"
        ]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        'status' => 'error', 
        'message' => 'Méthode non autorisée'
    ]);
}
?>