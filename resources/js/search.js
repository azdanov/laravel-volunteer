import algoliasearch from "algoliasearch";
import instantsearch from "instantsearch.js";
import { searchBox, hits } from "instantsearch.js/es/widgets";

const searchForm = document.querySelector("#search");

if (searchForm) {
    const hitsElement = searchForm.querySelector("#hits");

    const client = algoliasearch(
        process.env.MIX_ALGOLIA_CLIENT_ID,
        process.env.MIX_ALGOLIA_CLIENT_KEY
    );

    const search = instantsearch({
        indexName: process.env.MIX_ALGOLIA_CLIENT_INDEX,
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
            placeholder: "Search for Listings…",
            reset: false,
            autofocus: false,
            poweredBy: {
                cssClasses: {
                    root: "absolute pin-r pin-b poweredBy mr-1 opacity-50"
                }
            }
        })
    );

    search.addWidget(
        hits({
            container: "#hits",
            templates: {
                empty: "<small>No results</small>",
                item: ({ region, _highlightResult, category, id, live }) => {
                    const url = `${window.location.origin}/region/${
                        region.slug
                    }/category/${category.slug}/listing/${id}`;

                    if (!live) return null;

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
