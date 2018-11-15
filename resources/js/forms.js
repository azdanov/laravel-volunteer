/**
|--------------------------------------------------
| Favorite Listing (Disabled for demo)
|--------------------------------------------------
*/
const favoriteListingForm = document.querySelector("#favorite-listing-form");

if (favoriteListingForm && false) {
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
| Delete Favorite Listing (Disabled for demo)
|--------------------------------------------------
*/
const deleteFavoriteListingForms = document.querySelectorAll(
    "#delete-favorite-listing-form"
);

if (deleteFavoriteListingForms.length && false) {
    deleteFavoriteListingForms.forEach(form => {
        form.addEventListener("submit", function submitDeleteForm(event) {
            event.preventDefault();

            fetch(this.getAttribute("action"), {
                method: "delete",
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
