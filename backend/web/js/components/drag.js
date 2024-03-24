const draggables = document.querySelectorAll(".task");
const droppables = document.querySelectorAll(".swim-lane");
draggables.forEach(task => {
    task.addEventListener("dragstart", () => {
        task.classList.add("is-dragging");
    });
    task.addEventListener("dragend", () => {
        task.classList.remove("is-dragging");
    });
});
droppables.forEach(zone => {
    zone.addEventListener("dragover", e => {
        e.preventDefault();
        const bottomTask = insertAboveTask(zone, e.clientX);
        const curTask = document.querySelector(".is-dragging");
        if (!bottomTask) {
            zone.appendChild(curTask);
        } else {
            zone.insertBefore(curTask, bottomTask);
        }
    });
});
const insertAboveTask = (zone, mouseX) => {
    const els = zone.querySelectorAll(".task:not(.is-dragging)");
    let closestTask = null;
    let closestOffset = Number.NEGATIVE_INFINITY;
    els.forEach(task => {
        const {
            left
        } = task.getBoundingClientRect();
        const offset = mouseX - left;
        if (offset < 0 && offset > closestOffset) {
            closestOffset = offset;
            closestTask = task;
        }
    });
    return closestTask;
};

//# sourceURL=webpack://tailadmin-pro/./src/js/components/drag.js?