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

	// Tri plus récents / plus anciens
	if (tri) {
		tri.addEventListener("change", function () {
			chargerPhotos(true); // reset + remplace
		});
	}

	// Catégorie
	if (categorie) {
		categorie.addEventListener("change", function () {
			chargerPhotos(true);
		});
	}

	// Format
	if (format) {
		format.addEventListener("change", function () {
			chargerPhotos(true);
		});
	}
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

