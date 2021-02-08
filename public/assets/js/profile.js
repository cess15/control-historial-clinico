var fileInputFile = document.getElementById("file_picture_user");
var id = document.getElementById("id").value;
fileInputFile.addEventListener(
    "change",
    function (event) {
        const endpoint = `/api/perfil/avatar/${id}`;
        var formData = new FormData();
        formData.append("imagen_perfil", event.target.files[0]);
        var img1 = document.querySelector("#img_loader");
        img1.src = "/assets/img/loader.gif";
        fetch(endpoint, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .catch((error) => console.error("Error:", error))
            .then((response) => {
                var imgProfile = document.querySelectorAll(".img_profile");
                imgProfile.forEach((elem) => {
                    elem.src = response.url;
                });
            });
    },
    false
);
