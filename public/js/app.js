/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(4);


/***/ }),
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__forms__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__forms___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__forms__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__flash__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__flash___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__flash__);



/***/ }),
/* 2 */
/***/ (function(module, exports) {

/**
|--------------------------------------------------
| Favorite Listing (Disabled for demo)
|--------------------------------------------------
*/
var favoriteListingForm = document.querySelector("#favorite-listing-form");

if (favoriteListingForm && false) {
    favoriteListingForm.addEventListener("submit", function submitForm(event) {
        event.preventDefault();

        fetch(this.getAttribute("action"), {
            method: "post",
            credentials: "same-origin",
            body: new FormData(favoriteListingForm)
        }).then(function () {
            var button = favoriteListingForm.querySelector("button");
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
var deleteFavoriteListingForms = document.querySelectorAll("#delete-favorite-listing-form");

if (deleteFavoriteListingForms.length && false) {
    deleteFavoriteListingForms.forEach(function (form) {
        form.addEventListener("submit", function submitDeleteForm(event) {
            event.preventDefault();

            fetch(this.getAttribute("action"), {
                method: "delete",
                credentials: "same-origin",
                body: new FormData(form)
            }).then(function () {
                var button = form.querySelector("button");
                button.innerText = "Deleted!";
                button.disabled = true;
                button.blur();
            });
        });
    });
}

/***/ }),
/* 3 */
/***/ (function(module, exports) {

/**
|--------------------------------------------------
| Close Flash (Disabled for demo)
|--------------------------------------------------
*/
var flashCloseButtons = document.querySelectorAll("#flash-close");

if (flashCloseButtons.length && false) {
    flashCloseButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            button.parentNode.parentNode.removeChild(button.parentNode);
        });
    });
}

/***/ }),
/* 4 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);