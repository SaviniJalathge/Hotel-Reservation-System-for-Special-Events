// Add background effect on scroll for header
window.addEventListener("scroll", function () {
    const header = document.querySelector(".header");
    header.classList.toggle("scrolled", window.scrollY > 50);
});

// Add 'Book Now' button functionality
document.querySelectorAll(".btn").forEach((button) => {
    button.addEventListener("click", () => {
        alert("Your booking process will start shortly!");
    });
});
