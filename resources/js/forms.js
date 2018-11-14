const favoriteListingForm = document.querySelector("#favorite-listing-form");

if (favoriteListingForm) {
    favoriteListingForm.addEventListener("submit", function submitForm(event) {
        event.preventDefault();

        fetch(this.getAttribute("action"), {
            method: "post",
            credentials: "same-origin",
            body: new FormData(favoriteListingForm)
        }).then(() => {
            favoriteListingForm.removeEventListener("submit", submitForm);

            const button = favoriteListingForm.querySelector("button");
            button.innerText = "Favorited!";
            button.blur();
        });
    });
}
