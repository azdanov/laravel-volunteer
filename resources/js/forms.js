/**
|--------------------------------------------------
| Favorite Listing
|--------------------------------------------------
*/
const favoriteListingForm = document.querySelector("#favorite-listing-form");

if (favoriteListingForm) {
    favoriteListingForm.addEventListener("submit", function submitForm(event) {
        event.preventDefault();

        fetch(this.getAttribute("action"), {
            method: "post",
            credentials: "same-origin",
            body: new FormData(favoriteListingForm)
        }).then(() => {
            const button = favoriteListingForm.querySelector("button");
            button.innerText = "Favorited!";
            button.disabled = true;
            button.blur();
        });
    });
}

/**
|--------------------------------------------------
| Delete Favorite Listing
|--------------------------------------------------
*/
const deleteFavoriteListingForms = document.querySelectorAll(
    "#delete-favorite-listing-form"
);

if (deleteFavoriteListingForms.length) {
    deleteFavoriteListingForms.forEach(form => {
        form.addEventListener("submit", function submitDeleteForm(event) {
            event.preventDefault();

            fetch(this.getAttribute("action"), {
                method: "post",
                credentials: "same-origin",
                body: new FormData(form)
            }).then(() => {
                const button = form.querySelector("button");
                button.innerText = "Deleted!";
                button.disabled = true;
                button.blur();
            });
        });
    });
}
