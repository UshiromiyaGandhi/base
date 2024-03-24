const draggables = document.querySelectorAll(".image-item");

draggables.forEach(image => {
    image.draggable = true;

    image.addEventListener("dragstart", () => {
        image.classList.add("is-dragging");
    });

    image.addEventListener("dragend", () => {
        image.classList.remove("is-dragging");
    });
});

document.addEventListener("dragover", e => {
    e.preventDefault();
});

document.addEventListener("drop", e => {
    e.preventDefault();
    const draggedImage = document.querySelector(".is-dragging");

    if (e.target.classList.contains("image-item")) {
        const targetIndex = Array.from(e.target.parentNode.children).indexOf(e.target);
        const draggedIndex = Array.from(draggedImage.parentNode.children).indexOf(draggedImage);

        if (targetIndex < draggedIndex) {
            e.target.parentNode.insertBefore(draggedImage, e.target);
        } else {
            e.target.parentNode.insertBefore(draggedImage, e.target.nextSibling);
        }
    } else if (e.target.classList.contains("image-list")) {
        e.target.appendChild(draggedImage);
    }
});
