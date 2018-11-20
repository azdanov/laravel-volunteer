/* eslint-disable import/no-extraneous-dependencies */

const mix = require("laravel-mix");
require("laravel-mix-tailwind");
require("laravel-mix-purgecss");

mix.extract([
    "braintree-web-drop-in",
    "algoliasearch",
    "instantsearch.js",
    "instantsearch.js/es/widgets"
])
    .js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .tailwind()
    .version()
    .purgeCss({
        whitelistPatternsChildren: [/^ais-search-box/, /^ais-hits/]
    })
    .disableNotifications();
