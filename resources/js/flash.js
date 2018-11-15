/**
|--------------------------------------------------
| Close Flash (Disabled for demo)
|--------------------------------------------------
*/
const flashCloseButtons = document.querySelectorAll("#flash-close");

if (flashCloseButtons.length && false) {
    flashCloseButtons.forEach(button => {
        button.addEventListener("click", () => {
            button.parentNode.parentNode.removeChild(button.parentNode);
        });
    });
}
