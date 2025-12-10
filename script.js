let menubar = document.querySelector('#menu-bars');
let navbar  = document.querySelector('.navbar');

menubar.onclick = () =>{
    menubar.classList.toggle('fa-times');
    navbar.classList.toggle('active')
}




const galleryItems = document.querySelectorAll('.gallery-item');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.querySelector('.lightbox-img');
const closeLightbox = document.querySelector('.close-lightbox');


galleryItems.forEach(item => {
    item.addEventListener('click', () => {
        const imgSrc = item.querySelector('img').src; // Get the source of the clicked image
        lightboxImg.src = imgSrc; // Set the lightbox image source
        lightbox.classList.add('active'); // Show the lightbox
    });
});

// Close the lightbox when the close button is clicked
closeLightbox.addEventListener('click', () => {
    lightbox.classList.remove('active'); // Hide the lightbox
});

// Close the lightbox when clicking outside the image
lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
        lightbox.classList.remove('active'); 
    }
});





const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})