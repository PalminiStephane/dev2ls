<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('error_log', '/var/log/php_errors.log');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require dirname(__DIR__) . '/vendor/autoload.php';

// Assurez-vous que tous les en-têtes sont envoyés correctement
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Vérification du reCAPTCHA
        $recaptcha_secret = $_ENV['RECAPTCHA_SECRET_KEY'];
        $response = $_POST['g-recaptcha-response'] ?? '';
        
        if (empty($response)) {
            throw new Exception('Veuillez valider le captcha');
        }
        
        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$response}");
        $captcha_success = json_decode($verify);
        
        if (!$captcha_success->success) {
            throw new Exception('La validation du captcha a échoué');
        }

        // Protection CSRF
        if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
            $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            throw new Exception('Token de sécurité invalide');
        }

        // Limitation des soumissions (5 minutes)
        if (isset($_SESSION['last_submission']) && 
            time() - $_SESSION['last_submission'] < 300) {
            throw new Exception('Veuillez attendre 5 minutes avant de soumettre un nouveau message');
        }

        // Validation des données
        $name = strip_tags(trim($_POST["name"] ?? ''));
        $email = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
        $service = strip_tags(trim($_POST["service"] ?? ''));
        $budget = strip_tags(trim($_POST["budget"] ?? ''));
        $message = strip_tags(trim($_POST["message"] ?? ''));

        // Vérification des données requises
        if (empty($name) || empty($message)) {
            throw new Exception('Veuillez remplir tous les champs obligatoires');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Adresse email invalide');
        }

        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // Changé de DEBUG_SERVER à DEBUG_OFF
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['SMTP_USERNAME'];
            $mail->Password   = $_ENV['SMTP_PASSWORD'];
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
            $mail->AltBody = strip_tags($messageBody);

            $mail->send();

            // Régénérer le token CSRF après un envoi réussi
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            // Enregistrer l'heure de soumission
            $_SESSION['last_submission'] = time();

            // Réponse de succès
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => 'Votre message a été envoyé avec succès'
            ]);

        } catch (Exception $e) {
            throw new Exception("L'envoi du message a échoué : " . $mail->ErrorInfo);
        }

    } catch (Exception $e) {
        error_log("Erreur lors de l'envoi de l'email: " . $e->getMessage());
        http_response_code(400); // Changed from 500 to 400 for validation errors
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        'status' => 'error',
        'message' => 'Méthode non autorisée'
    ]);
}
