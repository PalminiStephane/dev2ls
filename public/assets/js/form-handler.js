document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    
    // Fonction pour obtenir un nouveau token CSRF
    async function getCSRFToken() {
        try {
            const response = await fetch('token.php');
            if (!response.ok) {
                throw new Error(`Erreur HTTP ${response.status}`);
            }
            const data = await response.json();
            if (data.token) {
                document.getElementById('csrf_token').value = data.token;
            } else {
                throw new Error('Token non reçu');
            }
        } catch (error) {
            console.error('Erreur lors de la récupération du token:', error);
            showMessage('Erreur de sécurité. Veuillez rafraîchir la page.', true);
        }
    }
    
    // Fonction pour afficher les messages avec animation
    function showMessage(message, isError = false) {
        let messageDiv = document.querySelector('.form-message');
        if (!messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.className = 'form-message';
            form.appendChild(messageDiv);
        }
        
        // Ajout de classes pour l'animation
        messageDiv.className = 'form-message';
        messageDiv.classList.add(isError ? 'error' : 'success');
        
        messageDiv.textContent = message;
        messageDiv.style.color = isError ? '#ff4444' : 'var(--neon-primary)';
        messageDiv.style.display = 'block';
        messageDiv.style.opacity = '1';
    }
    
    // Obtenir le token initial au chargement
    getCSRFToken();
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Désactiver le bouton submit pendant l'envoi
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        
        try {
            // Vérification du captcha
            const captchaResponse = grecaptcha.getResponse();
            if (!captchaResponse) {
                showMessage('Veuillez valider le captcha', true);
                submitButton.disabled = false;
                return;
            }
            
            const formData = new FormData(form);
            
            // Vérification que tous les champs requis sont remplis
            let isValid = true;
            form.querySelectorAll('[required]').forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                } else {
                    field.classList.remove('error');
                }
            });
            
            if (!isValid) {
                showMessage('Veuillez remplir tous les champs requis', true);
                submitButton.disabled = false;
                return;
            }
            
            const response = await fetch('send_email.php', {
                method: 'POST',
                body: formData
            });
            
            // Analyser la réponse JSON
            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || `Erreur HTTP ${response.status}`);
            }
            
            if (data.status === 'success') {
                showMessage(data.message || 'Message envoyé avec succès !');
                form.reset();
                grecaptcha.reset();
                await getCSRFToken();
            } else {
                throw new Error(data.message || 'Erreur lors de l\'envoi du message');
            }
            
        } catch (error) {
            console.error('Erreur:', error);
            showMessage(error.message || "Une erreur s'est produite. Veuillez réessayer.", true);
            grecaptcha.reset();
            await getCSRFToken();
        } finally {
            // Réactiver le bouton submit dans tous les cas
            submitButton.disabled = false;
        }
    });
});
