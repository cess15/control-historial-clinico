let infoDate = document.querySelectorAll(".info-date");
let infoDatetz = document.querySelectorAll(".info-date-tz");
let options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
};

let optionsTz = {
    dateStyle : "full",
    timeStyle : "full"
}
convertDate(infoDate);
convertDateTz(infoDatetz);

function convertDate(array) {
    array.forEach(function(element,index) {
        element.textContent=parseDate(array[index].textContent);
    });
}

function parseDate(string) {
    return new Date(string+"T05:00:00Z")
        .toLocaleString("es-ES", options)
        .replace("///g, " - "");
}

function convertDateTz(array) {
    array.forEach(function(element,index) {
        element.textContent=parseDateTz(array[index].textContent);
    });
}

function parseDateTz(string) {
    let date = new Date(string);
    return new Intl.DateTimeFormat("es-ES", optionsTz).format(date);
}
