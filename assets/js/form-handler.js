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

    // Obtenir le token initial au chargement
    getCSRFToken();

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        let messageDiv = document.querySelector('.form-message');
        if (!messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.className = 'form-message';
            form.appendChild(messageDiv);
        }

        try {
            const formData = new FormData(form);
            const response = await fetch('send_email.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();
            
            if (data.status === 'success') {
                messageDiv.textContent = data.message;
                messageDiv.style.color = 'var(--neon-primary)';
                form.reset();
                // Obtenir un nouveau token après un envoi réussi
                getCSRFToken();
            } else {
                messageDiv.textContent = data.message;
                messageDiv.style.color = '#ff4444';
                // Renouveler le token en cas d'erreur
                getCSRFToken();
            }
        } catch (error) {
            messageDiv.textContent = "Une erreur s'est produite. Veuillez réessayer.";
            messageDiv.style.color = '#ff4444';
            // Renouveler le token en cas d'erreur
            getCSRFToken();
        }
    });
});