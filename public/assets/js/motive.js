let on = document.getElementById("on");
let off = document.getElementById("off");
let showDiscapacity = document.getElementById("show-discapacity");
let porcentaje = document.getElementById("porcentaje");
let showPorcentege = document.getElementById("show-porcentaje");
let discapacidadFisica = document.getElementById("discapacidad-fisica");
let displayPorcentege = document.getElementById("display-porcentaje");
let radioDiscapacidad = document.querySelectorAll("[name=tipo_discapacidad]");

porcentaje.addEventListener("input", function () {
    showPorcentege.innerHTML = porcentaje.value + "%";
});

window.addEventListener("load", function () {
    if (on.checked == true) {
        showDiscapacity.style = "";
    }
    if (off.checked == true) {
        showDiscapacity.style = "display:none";
    }

    if (parseInt(porcentaje.value) > 1) {
        showPorcentege.innerHTML = porcentaje.value + "%";
    } else {
        showPorcentege.innerHTML = "0%";
    }
});

on.addEventListener("click", function () {
    if (on.checked == true) {
        showDiscapacity.style = "";
        porcentaje.value = "0";
        showPorcentege.innerHTML = "0%";
    }
});

off.addEventListener("click", function () {
    if (off.checked == true) {
        showDiscapacity.style = "display:none";
        unSelectDiscapacidad();
    }
});

function unSelectDiscapacidad() {
    radioDiscapacidad.forEach((x) => {
        x.checked = false;
        porcentaje.value = "0";
        showPorcentege.innerHTML = "0%";
    });
}
