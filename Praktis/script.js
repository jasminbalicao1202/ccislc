document.addEventListener("DOMContentLoaded", function () {
    const scrollLinks = document.querySelectorAll(".scroll-link");

    scrollLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); 
            const targetId = this.getAttribute("data-target");
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 50, // Adjusts for navbar height
                    behavior: "smooth"
                });
            }
        });
    });
});
