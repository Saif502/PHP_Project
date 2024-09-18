document.addEventListener("DOMContentLoaded", function () {
    var openPopupButton = document.getElementById("openPopupButton");
    var popupModal = document.getElementById("popupModal");
    var closePopupButton = document.getElementById("closePopupButton");

    openPopupButton.addEventListener("click", function () {
        popupModal.style.display = "block";
    });

    closePopupButton.addEventListener("click", function () {
        popupModal.style.display = "none";
    });

    // Close the modal when the user clicks outside the content
    window.addEventListener("click", function (event) {
        if (event.target == popupModal) {
            popupModal.style.display = "none";
        }
    });
});
