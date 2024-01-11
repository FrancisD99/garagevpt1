function createSlideshow(images) {
    let slideshowContainer = document.createElement('div');
    slideshowContainer.className = 'slideshow-container';

    images.forEach((image, index) => {
        let slide = document.createElement('div');
        slide.className = 'mySlides fade';
        let img = document.createElement('img');
        img.src = image;
        img.className = 'card1-img-top';
        slide.appendChild(img);
        slideshowContainer.appendChild(slide);
    });

    document.body.appendChild(slideshowContainer);
}


        function filterCars() {
            const marque = document.getElementById('marque').value.toLowerCase();
            const modele = document.getElementById('modele').value.toLowerCase();

            const cars = document.querySelectorAll('.car');

            const resultsContainer = document.querySelector('.search-results');
            resultsContainer.innerHTML = '';

            cars.forEach(car => {
                const carMarque = car.dataset.marque.toLowerCase();
                const carModele = car.dataset.modele.toLowerCase();

                if (carMarque.includes(marque) && carModele.includes(modele)) {
                resultsContainer.appendChild(car.cloneNode(true));
                }
            });
        }

        const urlParams = new URLSearchParams(window.location.search);
        const carId = urlParams.get('car');

        // Ajoutez ce script dans votre fichier `script.js`
let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 2000); // Change d'image toutes les 2 secondes
}

showSlides();
