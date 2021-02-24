let search = document.getElementById("search");
let column = document.querySelectorAll(".info-column");
let letter = "";
let array = [];

search.addEventListener("keypress", function (event) {
    letter = event.key.toLocaleLowerCase();
    array.push(letter);
    let arrayToString = array.toString().replaceAll(",", "");
    filterColumn(column, arrayToString);
});

search.addEventListener("keydown", function (event) {
    if (event.key == "Backspace") {
        array.pop(letter);
        let arrayToString = array.toString().replaceAll(",", "");
        filterColumn(column, arrayToString);
    }
});

function filterColumn(array, string) {
    for (let i = 0; i < array.length; i++) {
        if (
            array[
                i
            ].childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[0].innerHTML
                .toLocaleLowerCase()
                .includes(string)
        ) {
            array[i].style = "position: relative";
        } else {
            array[i].style = "display: none";
        }
    }
}
