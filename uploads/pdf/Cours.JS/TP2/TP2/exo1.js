
window.onload = function () {
	
	// Les noms des fichiers images
	var sources = ["paysage-1.jpg", "paysage-2.jpg", "paysage-3.jpg",
		"paysage-4.jpg", "paysage-5.jpg", "paysage-6.jpg",
		"paysage-7.jpg", "paysage-8.jpg", "paysage-9.jpg"];

	// L'indice de l'image actuellement visible
	var indice = 0;

	// Sélection de l'élément img du diaporama et des images de flèches
	var imgElement = document.getElementById('diaporamaImage');
	var prevArrow = document.getElementById('prevArrow');
	var nextArrow = document.getElementById('nextArrow');

	// Fonction pour mettre à jour l'image affichée
	function updateImage() {
		imgElement.src = sources[indice];
	}

	// Affiche l'image suivante
	function next() {
		indice = (indice + 1) % sources.length;
		updateImage();
	}

	// Affiche l'image précédente
	function previous() {
		indice = (indice - 1 + sources.length) % sources.length;
		updateImage();
	}

	// Relie les événements "onclick" aux images de flèches
	nextArrow.onclick = next;
	prevArrow.onclick = previous;

	// Initialisation de l'image au chargement
	updateImage();
};
