const titles = [
    "BIENVENU DANS NOTRE BLOC ANIMALIER",
    "VOTRE COMPAGNON, NOTRE PRIORITE",
    "UN ENVIROMENT AIMANT ET SÉCURISANT"
];

const backgrounds = [
    "url('../public/asset/dog-cat.jpg')", 
    "url('../public/asset/cat.jpg')",
    "url('../public/asset/dog.jpg')"
];

let index = 0;

function updateCarousel() {
    // Mettre à jour le titre
    const titleElement = document.getElementById('carousel-title');
    titleElement.textContent = titles[index];

    // Mettre à jour l'image de fond
    const mainBackground = document.querySelector('.main-background');
    mainBackground.style.backgroundImage = backgrounds[index];

    // Passer à l'index suivant
    index = (index + 1) % titles.length; 
}

// Initialiser le carrousel
updateCarousel(); 
setInterval(updateCarousel, 5000); 
