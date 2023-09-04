// JavaScript for a simple image slideshow
const slideshowImages = ["slide1.jpg", "slide2.jpg", "slide3.jpg"];
let currentSlide = 0;

function changeSlide() {
    const slideshow = document.getElementById("slideshow");
    currentSlide = (currentSlide + 1) % slideshowImages.length;
    slideshow.src = slideshowImages[currentSlide];
}

setInterval(changeSlide, 3000); // Change slide every 3 seconds
