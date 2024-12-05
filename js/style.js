// js/estilo.js
document.addEventListener("DOMContentLoaded", function () {
    const checkbox = document.getElementById("checkbox-menu");
    const menu = document.getElementById("menu");

    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            menu.classList.add("active");
        } else {
            menu.classList.remove("active");
        }
    });
});






