// Modale de contact

document.addEventListener('DOMContentLoaded', function() {
    const modaleContact = document.getElementById('contactModal');
    const boutonContact = document.querySelectorAll('.contact-btn'); // classe ajoutée dans WordPress
    const boutonFermer = document.querySelector('.modal .close');

    // Fonction pour ouvrir la modale
    function ouvrirModale() {
        if (modaleContact) {
            modaleContact.style.display = 'block';
        }
    }

    // Fonction pour fermer la modale
    function fermerModale() {
        if (modaleContact) {
            modaleContact.style.display = 'none';
        }
    }

    // On ajoute l'événement click sur chaque bouton "Contact"
    boutonContact.forEach(function(bouton) {
        bouton.addEventListener('click', function() {
            ouvrirModale(); 
        });
    });

    // On ferme si on clique à l'extérieur de la zone
    window.addEventListener('click', function(event) {
        if (event.target === modaleContact) {
            fermerModale();
        }
    });
    
    // On ferme avec "Echap"
    window.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            fermerModale();
        }
        });

});