const uploadInput = document.querySelector(".song-input");
const browseBtn = document.querySelector(".browse-btn");
const uploadsContainner = document.querySelector(".audio-containner__uploads");
const dragArea = document.querySelector(".audio-containner__drag-drop-section");

//function that adds an upload to the uploads containner
const appendNewUpload = fileName => {
    const upload = document.createElement("div");
    upload.classList.add("audio-containner__upload");
    upload.innerHTML = `
        <p><span class="index">${uploadsContainner.childNodes.length}.</span> <input type="text" value="" placeholder="Track Title:" name="trName" required /></p>
        <span class="delete">
            <img src="../assets/img/icons/close.svg" alt="close icon" class="delete-icon">
        </span>
        <button>Add</button>
    `;
    uploadsContainner.appendChild(upload);
};

//Browse file click
browseBtn.addEventListener("click", () => {
    uploadInput.click();
});

uploadInput.addEventListener("change", e => {
    const fileName = e.target.value.split("fakepath\\")[1];
    appendNewUpload(fileName);
});

//drag and drop logic
dragArea.addEventListener("dragover", function(e) {
    e.preventDefault();
    this.style.borderStyle = "solid";
});
dragArea.addEventListener("dragleave", function(e) {
    e.preventDefault();
    this.style.borderStyle = "dashed";
});
dragArea.addEventListener("drop", e => {
    e.preventDefault();
    const fileName = e.dataTransfer.files[0].name;
    const fileType = e.dataTransfer.files[0].type;
    if (!fileType.includes("audio")) {
        alert("File type not allowed!");
        return;
    }
    appendNewUpload(fileName);
});

//remove an upload (song)
uploadsContainner.addEventListener("click", e => {
    let node;
    //conditions to target the delete icon or its containner
    if (e.target.className === "delete") {
        node = e.target.parentNode;
    } else if (e.target.className === "delete-icon") {
        node = e.target.parentNode.parentNode;
    }
    uploadsContainner.removeChild(node);

    //reorganize items index
    const indexNodes = document.querySelectorAll(".index");
    for (let i = 0; i < indexNodes.length; i++) {
        indexNodes[i].textContent = i + 1;
    }
});
