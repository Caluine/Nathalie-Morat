// Modale de contact

document.addEventListener("DOMContentLoaded", function () {
	const modaleContact = document.getElementById("contactModal");
	const boutonContact = document.querySelectorAll(".contact-btn"); // classe ajoutée dans WordPress
	const boutonFermer = document.querySelector(".modal .close");

	// Fonction pour ouvrir la modale
	function ouvrirModale() {
		if (modaleContact) {
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
	boutonContact.forEach(function (bouton) {
		bouton.addEventListener("click", function () {
			ouvrirModale();
		});
	});

	// On ferme si on clique à l'extérieur de la zone
	window.addEventListener("click", function (event) {
		if (event.target === modaleContact) {
			fermerModale();
		}
	});

	// On ferme avec "Echap"
	window.addEventListener("keydown", function (event) {
		if (event.key === "Escape") {
			fermerModale();
		}
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
			body: "action=charger_plus&page=" + page + "&tri=" + tri.value + "&categorie=" + categorie.value + "&format=" + format.value,
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
