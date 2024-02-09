let edit = document.getElementById("edit");
let update = document.getElementById("update");
let cancel = document.getElementById("cancel");

let fileInput = document.getElementById("file");

    edit.addEventListener("click", function () {
        edit.style.display = "none";
        update.style.display = "inline";
        cancel.style.display = "inline";

        let select = document.getElementsByTagName("select")[0];
        select.disabled = false;

        // Enable the file input
        fileInput.disabled = false;

        let inputs = document.getElementsByTagName("input");
        for (let x = 0; x < inputs.length; x++) {
            inputs[x].disabled = false;
        }
    });
    cancel.addEventListener("click", function () {
            location.reload();
        });
        update.addEventListener("click", function () {
            location.reload();
        });