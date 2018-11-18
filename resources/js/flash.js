/**
 |--------------------------------------------------
 | Close Flash
 |--------------------------------------------------
 */
const flashClose = document.querySelectorAll("#flash-close");

if (flashClose.length) {
    flashClose.forEach(close => {
        close.addEventListener("click", event => {
            event.preventDefault();
            close.parentNode.parentNode.removeChild(close.parentNode);
        });
    });
}
