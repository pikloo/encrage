/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/***/ (() => {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
// Scroll to top
var backToTop = function backToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
};
var toTopButtons = document.querySelectorAll(".to-top");
var imagesGallery = document.querySelectorAll(".gallery-img");
var serieAnchorLink = document.querySelector(".menu-item[data-serie-anchor-link]");
var aboutAnchorLink = document.querySelector(".menu-item[data-about-anchor-link]");
var aboutCallback = function aboutCallback(entries) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      aboutAnchorLink.setAttribute('aria-current', 'location');
      serieAnchorLink.setAttribute('aria-current', 'false');
    } else {
      serieAnchorLink.setAttribute('aria-current', 'location');
      aboutAnchorLink.setAttribute('aria-current', 'false');
    }
  });
};
var aboutSerieSection = document.querySelector("#about");
var aboutSerieSectionObserver = new IntersectionObserver(aboutCallback, {
  rootMargin: '50px',
  threshold: 1
});
if (aboutSerieSection) {
  window.addEventListener("scroll", function () {
    aboutSerieSectionObserver.observe(aboutSerieSection);
  });
}
if (serieAnchorLink) {
  serieAnchorLink.addEventListener("click", function (e) {
    backToTop();
    var link = e.currentTarget;
    link.querySelector('h2').classList.add("text-gray-500");
    link.setAttribute('aria-current', 'location');
    aboutAnchorLink.setAttribute('aria-current', 'false');
    aboutAnchorLink.querySelector('h2').classList.remove("text-gray-500");
  });
}
if (aboutAnchorLink) {
  aboutAnchorLink.addEventListener('click', function (e) {
    var link = e.currentTarget;
    link.querySelector('h2').classList.add("text-gray-500");
    link.setAttribute('aria-current', 'location');
    serieAnchorLink.setAttribute('aria-current', 'false');
    serieAnchorLink.querySelector('h2').classList.remove("text-gray-500");
  });
}
[].concat(_toConsumableArray(toTopButtons), _toConsumableArray(imagesGallery)).forEach(function (button) {
  button.addEventListener("click", backToTop);
});
var menuToogle = document.getElementById('menu-toggle');
var onClickOnMenuToggle = function onClickOnMenuToggle() {
  // Toggle class "opened". Set also aria-expanded to true or false.
  if (-1 !== menuToogle.className.indexOf('opened')) {
    menuToogle.className = menuToogle.className.replace(' opened', '');
    menuToogle.setAttribute('aria-expanded', 'false');
    document.getElementById("sideBar").style.left = "-100%";
    document.getElementById("sideNav").style.left = "-100%";
  } else {
    document.querySelector(".main-header").classList.remove("z-0");
    document.querySelector(".main-header").classList.add("z-20");
    menuToogle.className += ' opened';
    menuToogle.setAttribute('aria-expanded', 'true');
    document.getElementById("sideBar").style.left = "0";
    document.getElementById("sideNav").style.left = "0";
  }
};
menuToogle.addEventListener("click", onClickOnMenuToggle);

//Apparition au scroll
var callback = function callback(entries) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      entry.target.classList.add("inview");
    } else if (!entry.isIntersecting && entry.target.classList.contains('to-down')) {
      entry.target.classList.remove("inview");
    }
  });
};
var observer = new IntersectionObserver(callback);
var targets = document.querySelectorAll(".reveal");
targets.forEach(function (target) {
  observer.observe(target);
});

//Main min height

var main = document.querySelector(".main");
var header = document.querySelector(".main-header");
var footer = document.querySelector("footer");
var screenHeight = window.screen.height;
main.style.minHeight = "".concat(screenHeight - footer.offsetHeight - header.offsetHeight, "px");

// //Titre fixe lorsqu'il arrive sous le logo(Page Single Série)
// const portfolioTitle = document.querySelector(".portfolio-title");
// const sliderActive = document.querySelector(".gallery");

// if (portfolioTitle) {
//   const basePosition = sliderActive.offsetHeight;
//   portfolioTitle.classList.add('md:absolute', 'md:top-36')
//   // portfolioTitle.setAttribute('style', `top:${basePosition}px; z-index:11; position:absolute;`);

//   document.addEventListener("scroll", (event) => {
//     if (portfolioTitle.getBoundingClientRect().top < header.offsetHeight + 150) {
//       portfolioTitle.classList.remove('md:absolute')
//       portfolioTitle.classList.add('md:fixed')
//     }

//     if (window.scrollY < basePosition - 20) {
//       portfolioTitle.classList.remove('md:fixed')
//       portfolioTitle.classList.add('md:absolute')
//     }
//   });

// }

//Scroll to photographers (home)
var toDownButton = document.querySelector('.to-down');
if (toDownButton) {
  toDownButton.addEventListener("click", function (event) {
    event.preventDefault();
    window.scrollTo({
      top: document.querySelector('#slider').offsetHeight - document.querySelector('.main-header').offsetHeight,
      inline: "nearest"
    });
  });
}

//Désactivation du clic droit sur les images

var images = document.querySelectorAll("img:not(.logo-site)");
images.forEach(function (image) {
  image.addEventListener("contextmenu", function (e) {
    e.preventDefault();
  }, false);
});
var releases = document.querySelectorAll(".release");
releases.forEach(function (release) {
  release.addEventListener("click", function () {
    // document.querySelector(".main-header").classList.remove("z-20");
    // document.querySelector(".main-header").classList.add("z-0", "duration-100");
  });
});

/***/ }),

/***/ "./src/gallery.js":
/*!************************!*\
  !*** ./src/gallery.js ***!
  \************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /var/www/html/encrage/website/wp-content/themes/encrage/src/gallery.js: Unexpected token (46:0)\n\n\u001b[0m \u001b[90m 44 |\u001b[39m     prevEl\u001b[33m:\u001b[39m \u001b[32m\".swiper-button-prev\"\u001b[39m\u001b[33m,\u001b[39m\n \u001b[90m 45 |\u001b[39m   }\u001b[33m,\u001b[39m\n\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 46 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\n \u001b[90m    |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\n \u001b[90m 47 |\u001b[39m   \u001b[90m// thumbs: {\u001b[39m\n \u001b[90m 48 |\u001b[39m   \u001b[90m//   swiper: serieGalleryThumbnails,\u001b[39m\n \u001b[90m 49 |\u001b[39m   \u001b[90m// },\u001b[39m\u001b[0m\n    at constructor (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:353:19)\n    at JSXParserMixin.raise (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:3277:19)\n    at JSXParserMixin.unexpected (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:3297:16)\n    at JSXParserMixin.parsePropertyName (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11539:18)\n    at JSXParserMixin.parsePropertyDefinition (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11411:22)\n    at JSXParserMixin.parseObjectLike (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11354:21)\n    at JSXParserMixin.parseExprAtom (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10875:23)\n    at JSXParserMixin.parseExprAtom (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:6821:20)\n    at JSXParserMixin.parseExprSubscripts (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10590:23)\n    at JSXParserMixin.parseUpdate (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10573:21)\n    at JSXParserMixin.parseMaybeUnary (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10551:23)\n    at JSXParserMixin.parseMaybeUnaryOrPrivate (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10405:61)\n    at JSXParserMixin.parseExprOps (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10410:23)\n    at JSXParserMixin.parseMaybeConditional (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10387:23)\n    at JSXParserMixin.parseMaybeAssign (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10348:21)\n    at /var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10318:39\n    at JSXParserMixin.allowInAnd (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11936:12)\n    at JSXParserMixin.parseMaybeAssignAllowIn (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10318:17)\n    at JSXParserMixin.parseExprListItem (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11696:18)\n    at JSXParserMixin.parseExprList (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11671:22)\n    at JSXParserMixin.parseNew (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11271:25)\n    at JSXParserMixin.parseNewOrNewTarget (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11266:17)\n    at JSXParserMixin.parseExprAtom (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10884:21)\n    at JSXParserMixin.parseExprAtom (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:6821:20)\n    at JSXParserMixin.parseExprSubscripts (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10590:23)\n    at JSXParserMixin.parseUpdate (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10573:21)\n    at JSXParserMixin.parseMaybeUnary (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10551:23)\n    at JSXParserMixin.parseMaybeUnaryOrPrivate (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10405:61)\n    at JSXParserMixin.parseExprOps (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10410:23)\n    at JSXParserMixin.parseMaybeConditional (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10387:23)\n    at JSXParserMixin.parseMaybeAssign (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10348:21)\n    at /var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10318:39\n    at JSXParserMixin.allowInAnd (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:11931:16)\n    at JSXParserMixin.parseMaybeAssignAllowIn (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:10318:17)\n    at JSXParserMixin.parseVar (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12864:91)\n    at JSXParserMixin.parseVarStatement (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12710:10)\n    at JSXParserMixin.parseStatementContent (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12322:23)\n    at JSXParserMixin.parseStatementLike (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12239:17)\n    at JSXParserMixin.parseModuleItem (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12216:17)\n    at JSXParserMixin.parseBlockOrModuleBlockBody (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12796:36)\n    at JSXParserMixin.parseBlockBody (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12789:10)\n    at JSXParserMixin.parseProgram (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12116:10)\n    at JSXParserMixin.parseTopLevel (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:12106:25)\n    at JSXParserMixin.parse (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:13905:10)\n    at parse (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/parser/lib/index.js:13947:38)\n    at parser (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/core/lib/parser/index.js:41:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/core/lib/transformation/normalize-file.js:64:37)\n    at normalizeFile.next (<anonymous>)\n    at run (/var/www/html/encrage/website/wp-content/themes/encrage/node_modules/@babel/core/lib/transformation/index.js:21:50)");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_modules__["./src/app.js"]();
/******/ 	// This entry module doesn't tell about it's top-level declarations so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/gallery.js"]();
/******/ 	
/******/ })()
;
//# sourceMappingURL=main.js.map