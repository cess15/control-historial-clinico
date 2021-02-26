let search = document.getElementById("search");
let column = document.querySelectorAll(".info-column");
let title = document.querySelectorAll(".info-title");
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
    [...title].forEach((element, index) => {
        if (element.innerHTML.toLocaleLowerCase().includes(string)) {
            array[index].style = "positon:relative";
        } else {
            array[index].style = "display: none";
        }
    });
}
