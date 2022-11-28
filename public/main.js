// toggle Burger
const hamburger = document.querySelector(".hamburger");
const navmenu = document.querySelector(".nav-menu");
const body = document.querySelector("body");

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle("active");
    navmenu.classList.toggle("active");

})

// toggle Concept
const toggleconcept = document.querySelector(".toggleconcept");
const concept = document.querySelector(".concept");

toggleconcept.addEventListener('click', function(){
    toggleconcept.classList.toggle("active");
    concept.classList.toggle("active");
})

// toggle Programme
const toggleprogramme = document.querySelector(".toggleprogramme");
const programme = document.querySelector(".programme");

toggleprogramme.addEventListener('click', function(){
    toggleprogramme.classList.toggle("active");
    programme.classList.toggle("active");

})
