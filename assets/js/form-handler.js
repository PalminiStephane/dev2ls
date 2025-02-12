document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    
    // Fonction pour obtenir un nouveau token CSRF
    async function getCSRFToken() {
        try {
            const response = await fetch('token.php');
            const data = await response.json();
            document.getElementById('csrf_token').value = data.token;
        } catch (error) {
            console.error('Erreur lors de la récupération du token:', error);
        }
    }

    // Fonction pour afficher les messages
    function showMessage(message, isError = false) {
        let messageDiv = document.querySelector('.form-message');
        if (!messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.className = 'form-message';
            form.appendChild(messageDiv);
        }
        messageDiv.textContent = message;
        messageDiv.style.color = isError ? '#ff4444' : 'var(--neon-primary)';
    }

    // Obtenir le token initial au chargement
    getCSRFToken();

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Vérification du captcha
        const captchaResponse = grecaptcha.getResponse();
        if (!captchaResponse) {
            showMessage('Veuillez valider le captcha', true);
            return;
        }

        try {
            const formData = new FormData(form);
            const response = await fetch('send_email.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();
            
            if (data.status === 'success') {
                showMessage(data.message);
                form.reset();
                grecaptcha.reset(); // Réinitialiser le captcha
                getCSRFToken(); // Obtenir un nouveau token
            } else {
                showMessage(data.message, true);
                grecaptcha.reset(); // Réinitialiser le captcha en cas d'erreur
                getCSRFToken();
            }
        } catch (error) {
            showMessage("Une erreur s'est produite. Veuillez réessayer.", true);
            grecaptcha.reset();
            getCSRFToken();
        }
    });
});