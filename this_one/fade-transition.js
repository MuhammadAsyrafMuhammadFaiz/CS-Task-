// Black fade transition effect
document.addEventListener("DOMContentLoaded", () => {
    const fadeDiv = document.querySelector('.fade-transition');
    if (fadeDiv) {
        fadeDiv.style.transition = "opacity 1.5s ease-in-out";
        fadeDiv.style.opacity = "1";

        setTimeout(() => {
            fadeDiv.style.opacity = "0";
        }, 100); // Start fade immediately
    }
});

// Add fade-out when leaving the page
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        const href = link.href;
        const fadeDiv = document.querySelector('.fade-transition');
        if (fadeDiv) {
            fadeDiv.style.opacity = "1";
        } else {
            window.location.href = href; // Fallback if fade div not found
        }
    });
});
