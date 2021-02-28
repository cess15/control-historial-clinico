let infoDate = document.querySelectorAll(".info-date");
let options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
};
convertDate(infoDate);

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
