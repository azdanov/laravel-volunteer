import braintree from "braintree-web-drop-in";

const formDisabled = false;

/**
 |--------------------------------------------------
 | Favorite Listing (Disabled for demo)
 |--------------------------------------------------
 */
const favoriteListingForm = document.querySelector("#favorite-listing-form");

if (favoriteListingForm && formDisabled) {
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

if (deleteFavoriteListingForms.length && formDisabled) {
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

/**
 |--------------------------------------------------
 | Pay Listing
 |--------------------------------------------------
 */
const payListingForm = document.querySelector("#pay-listing-form");

if (payListingForm) {
    const fetchBraintreeFormButton = document.querySelector(
        "#fetch-braintree-form-button"
    );

    fetchBraintreeFormButton.addEventListener("click", async () => {
        fetchBraintreeFormButton.innerText = "Loading...";
        fetchBraintreeFormButton.classList.add("opacity-75");
        fetchBraintreeFormButton.disabled = true;

        const response = await fetch(
            `${window.location.origin}/payment/token`,
            {
                method: "post",
                credentials: "same-origin",
                body: new FormData(payListingForm)
            }
        );

        const { token } = await response.json();

        const dropinContainer = payListingForm.querySelector(
            "#dropin-container"
        );

        braintree.create(
            {
                authorization: token,
                container: dropinContainer
            },
            (createErr, instance) => {
                fetchBraintreeFormButton.classList.add("hidden");

                const processButton = payListingForm.querySelector(
                    "#process-braintree-form-button"
                );
                const demoCardNumber = payListingForm.querySelector(
                    "#card_number"
                );

                processButton.classList.remove("hidden");
                demoCardNumber.classList.remove("hidden");

                processButton.addEventListener("click", () => {
                    processButton.classList.add("hidden");

                    const payButton = payListingForm.querySelector(
                        "#pay-listing-form-pay-button"
                    );
                    payButton.classList.remove("hidden");

                    demoCardNumber.classList.add("hidden");

                    dropinContainer.classList.remove("-mt-3");
                    dropinContainer.classList.add("mt-3");

                    instance.requestPaymentMethod((err, payload) => {
                        payListingForm.payment_nonce.value = payload.nonce;
                    });
                });
            }
        );
    });
}
