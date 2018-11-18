import algoliasearch from "algoliasearch";
import instantsearch from "instantsearch.js";
import { searchBox, hits } from "instantsearch.js/es/widgets";

const searchForm = document.querySelector("#search");

if (searchForm) {
    const hitsElement = searchForm.querySelector("#hits");

    const client = algoliasearch(
        "4PN91CX56L",
        "4948d13b2129e56e110dd6b9fb3340dc"
    );

    const search = instantsearch({
        indexName: "listings",
        routing: true,
        searchClient: client,
        searchFunction(helper) {
            if (helper.state.query) {
                hitsElement.classList.remove("hidden");
                return helper.search();
            }

            hitsElement.classList.add("hidden");
            return helper;
        }
    });

    search.addWidget(
        searchBox({
            container: "#search-box",
            placeholder: "Search for Listings",
            reset: false
        })
    );

    search.addWidget(
        hits({
            container: "#hits",
            templates: {
                empty: "<small>No results</small>",
                item: ({ region, _highlightResult, category, id }) => {
                    const url = `${window.location.origin}/region/${
                        region.slug
                    }/category/${category.slug}/listing/${id}`;

                    return `
                        <a href="${url}" class="no-underline text-sm text-green-darker hover:underline">
                            ${_highlightResult.title.value} -
                            <span class="text-grey-darker">${
                                _highlightResult.category.name.value
                            } in
                            ${_highlightResult.region.name.value}</span>
                        </a>
                    `;
                }
            }
        })
    );

    search.start();
}
