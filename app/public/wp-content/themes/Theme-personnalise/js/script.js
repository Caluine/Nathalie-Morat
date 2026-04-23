// Modale de contact
document.addEventListener("DOMContentLoaded", function () {
    const modaleContact = document.getElementById("contactModal");
    const boutonsContact = document.querySelectorAll(".contact-btn");
    const refPhoto = document.getElementById("ref-photo"); // L'ID ajouté dans CF7

    // Fonction pour ouvrir la modale
    function ouvrirModale(referenceValue = "") {
        if (modaleContact) {
            // Si on a une référence, on l'injecte dans le champ du formulaire
            if (refPhoto) {
                refPhoto.value = referenceValue;
            }
            modaleContact.style.display = "flex";
        }
    }

    // Fonction pour fermer la modale
    function fermerModale() {
        if (modaleContact) {
            modaleContact.style.display = "none";
        }
    }

    // On ajoute l'événement click sur chaque bouton "Contact"
    boutonsContact.forEach(function (bouton) {
        bouton.addEventListener("click", function () {
            // On récupère la valeur du data-reference (sera vide pour le bouton du header)
            const ref = this.getAttribute("data-reference") || "";
            ouvrirModale(ref);
        });
    });

    // On ferme si on clique à l'extérieur ou avec Echap (ton code actuel est parfait ici)
    window.addEventListener("click", function (event) {
        if (event.target === modaleContact) { fermerModale(); }
    });

    window.addEventListener("keydown", function (event) {
        if (event.key === "Escape") { fermerModale(); }
    });
});

// Page d'accueil

document.addEventListener("DOMContentLoaded", function () {
	let page = 1;
	const tri = document.getElementById("filtre-tri");
	const bouton = document.querySelector(".bouton_pagination button");
	const gallery = document.getElementById("gallery");
	const categorie = document.getElementById("filtre-categorie");
	const format = document.getElementById("filtre-format");

    jQuery(document).ready(function($) {
    $('#filtre-categorie').select2({
        width: '200px',
        minimumResultsForSearch: Infinity
    });

    $('#filtre-format').select2({
        width: '200px',
        minimumResultsForSearch: Infinity
    });

    $('#filtre-tri').select2({
        minimumResultsForSearch: Infinity // enlève la barre de recherche
    });
});
    

	// On crée la fonction qu'on va réutilisé plusieurs fois
	function chargerPhotos(reset = false) {
		if (reset) {
			page = 1;
		}
		//Dans l'ordre on demande un formulaire de type classique puis on demande avec body
		//De modifier en fonction de la demande et de repondre en HTML puis soit on remplace soit on affiche après avec beforeend
		fetch(ajaxurl, {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: "action=charger_plus&page=" + page + "&tri=" + tri.value + "&categorie=" + categorie.value + "&format=" + format.value + "&nonce=" + nonce,
		})
			.then((response) => response.text())
			.then((html) => {
				if (reset) {
					gallery.innerHTML = html;
				} else {
					gallery.insertAdjacentHTML("beforeend", html);
				}
			});
	}

	// Bouton "charger plus"
	if (bouton) {
		bouton.addEventListener("click", function () {
			page++;
			chargerPhotos(); // ajoute à la suite
		});
        
	}

	// Partie filtres avec select2
	jQuery(document).ready(function($) {

    $('#filtre-categorie').select2({
        width: '200px',
        minimumResultsForSearch: Infinity
    });

    $('#filtre-format').select2({
        width: '200px',
        minimumResultsForSearch: Infinity
    });

    $('#filtre-tri').select2({
        minimumResultsForSearch: Infinity
    });

   
    $('#filtre-categorie, #filtre-format, #filtre-tri').on('change', function() {
        chargerPhotos(true);
    });

});
});

// Menu burger

document.addEventListener("DOMContentLoaded", function () {

  const burger = document.querySelector(".burger");
  const menu = document.querySelector(".main-menu");

  if (burger && menu) {
    burger.addEventListener("click", function () {

      burger.classList.toggle("active");
      menu.classList.toggle("active");

    });
  }

});

// Lightbox

document.addEventListener('DOMContentLoaded', () => {
    const lightbox = document.getElementById('lightbox');
    const imageLightbox = document.getElementById('lightbox-img');
    const texteReference = document.getElementById('lb-ref');
    const texteCategorie = document.getElementById('lb-cat');

    let positionImage = 0;
    let listePhotos = [];

    // Met à jour l'affichage de la lightbox
    const afficherDansLightbox = (nouvellePosition) => {
        listePhotos = document.querySelectorAll('.photo_accueil');
        
        // boucle
        if (nouvellePosition >= listePhotos.length) nouvellePosition = 0;
        if (nouvellePosition < 0) nouvellePosition = listePhotos.length - 1;
        
        positionImage = nouvellePosition;

        const blocPhoto = listePhotos[positionImage];
        const image = blocPhoto.querySelector('img');

        imageLightbox.src = image.getAttribute('data-full') || image.src;
        texteReference.textContent = blocPhoto.querySelector('.bouton-plein-ecran')?.dataset.ref || '';
        texteCategorie.textContent = blocPhoto.querySelector('.categorie')?.textContent || '';
    };

    document.addEventListener('click', (evenement) => {
        const elementClique = evenement.target;

        // ouvrir la lightbox
        const bouton = elementClique.closest('.bouton-plein-ecran');
        if (bouton && window.innerWidth > 768) {
            evenement.preventDefault();

            const blocPhoto = bouton.closest('.photo_accueil');

            const position = Array.from(document.querySelectorAll('.photo_accueil')).indexOf(blocPhoto);

            afficherDansLightbox(position);
            lightbox.style.display = 'flex';
            return;
        }

        if (lightbox.style.display !== 'flex') return;

        // bouton suivant
        if (elementClique.closest('.suivant')) {
            afficherDansLightbox(positionImage + 1);
        } 
        // bouton precedent
        else if (elementClique.closest('.precedent')) {
            afficherDansLightbox(positionImage - 1);
        }
        // fermer la lightbox
        else if (elementClique.closest('.close-lightbox') || elementClique === lightbox) {
            lightbox.style.display = 'none';
        }
    });
});






