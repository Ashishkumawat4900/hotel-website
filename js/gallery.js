let items = [];
let currentIndex = 0;

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".popup-item").forEach(item => {
        item.addEventListener("click", () => openPopup(item));
    });
});

// FILTER AWARE ITEMS
function getVisibleItems() {
    return Array.from(document.querySelectorAll(".popup-item"))
        .filter(el => el.closest(".gallery-item")?.style.display !== "none");
}

function openPopup(clickedItem) {
    items = getVisibleItems();
    currentIndex = items.indexOf(clickedItem);

    document.getElementById("popup").style.display = "flex";
    showItem();
}

function closePopup() {
    const video = document.getElementById("popupVideo");
    video.pause();
    video.src = "";
    document.getElementById("popup").style.display = "none";
}

function showItem() {
    const img = document.getElementById("popupImg");
    const video = document.getElementById("popupVideo");

    img.style.display = "none";
    video.style.display = "none";
    video.pause();

    const el = items[currentIndex];

    if (el.dataset.type === "img") {
        img.src = el.src;
        img.style.display = "block";
    } else {
        video.src = el.dataset.src;
        video.style.display = "block";
        video.play();
    }
}

function nextItem() {
    currentIndex = (currentIndex + 1) % items.length;
    showItem();
}

function prevItem() {
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    showItem();
}

/* FILTER */
function filterGallery(category) {
    document.querySelectorAll(".gallery-item").forEach(item => {
        if (category === "all") {
            item.style.display = item.classList.contains("video-item")
                ? "none"
                : "block";
        } 
        else if (category === "rooms") {
            item.style.display = item.classList.contains("rooms")
                ? "block"
                : "none";
        } 
        else {
            item.style.display =
                item.classList.contains(category) &&
                !item.classList.contains("video-item")
                    ? "block"
                    : "none";
        }
    });
}
