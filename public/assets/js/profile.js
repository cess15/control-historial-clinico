var fileInputFile = document.getElementById("file_picture_user");
fileInputFile.addEventListener("change", function (event) {
    var formData = new FormData();
    formData.append("imagen_perfil", event.target.files[0]);
    fetch("/api/perfil/avatar", {
        method: "post",
        body: formData,
    })
        .then((response) => console.log(response.json()))
        .catch(error => console.error('Error:', error))
        .then((response) => console.log(response));
}, false);
