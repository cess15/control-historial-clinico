let fecha = document.querySelectorAll(".info-edad");
[...fecha].map((c, i) => {
    fecha[i].textContent =
        new Date().getFullYear() - new Date(c.textContent).getFullYear();
});
