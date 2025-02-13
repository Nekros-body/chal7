const hammenu = document.querySelector('.ham-menu');
const offscreenmenu = document.querySelector('.off-screen-menu');

// Toggle menu on hamburger click
hammenu.addEventListener('click', () => {
    hammenu.classList.toggle('active');
    offscreenmenu.classList.toggle('active');
});

