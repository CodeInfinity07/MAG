const uploadInput = document.querySelector(".songImg-input");
const browseBtn = document.querySelector(".browse-btn");
const dragArea = document.querySelector(".album-containner__not-uploaded");
const img = document.querySelector(
    ".album-containner__uploaded__img-containner img"
);
const uploadedDiv = document.querySelector(".album-containner__uploaded");
const editDeleteBtns = document.querySelectorAll(
    ".album-containner__uploaded__controls button"
);

//Browse file click
browseBtn.addEventListener("click", () => {
    uploadInput.click();
});

uploadInput.addEventListener("change", function() {
    const file = this.files[0];
    displayImg(dragArea, uploadedDiv, file);
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
dragArea.addEventListener("drop", function(e) {
    e.preventDefault();
    this.style.borderStyle = "dashed";
    const file = e.dataTransfer.files[0];
    displayImg(this, uploadedDiv, file);
});

//edit delete logic
for (let btn of editDeleteBtns) {
    btn.addEventListener("click", () => {
        uploadedDiv.style.display = "none";
        dragArea.style.display = "flex";
    });
}

//function to display the image set by the user
const displayImg = (hideDiv, displayDiv, file) => {
    //ckeck if the file set is of type image
    const fileType = file.type;
    if (!fileType.includes("image")) {
        alert("File type not allowed!");
        return;
    }

    const fileReader = new FileReader();
    fileReader.onload = () => {
        const fileUrl = fileReader.result;
        hideDiv.style.display = "none";
        displayDiv.style.display = "flex";
        img.setAttribute("src", fileUrl);
    };
    fileReader.readAsDataURL(file);
};
