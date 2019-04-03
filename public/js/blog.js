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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./app/Modules/Blog/Presentation/Assets/js/app.js":
/*!********************************************************!*\
  !*** ./app/Modules/Blog/Presentation/Assets/js/app.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./components/top-bar */ "./app/Modules/Blog/Presentation/Assets/js/components/top-bar.js");

__webpack_require__(/*! ./components/blog-category-chooser */ "./app/Modules/Blog/Presentation/Assets/js/components/blog-category-chooser.js");

/***/ }),

/***/ "./app/Modules/Blog/Presentation/Assets/js/components/blog-category-chooser.js":
/*!*************************************************************************************!*\
  !*** ./app/Modules/Blog/Presentation/Assets/js/components/blog-category-chooser.js ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var BlogCategoryChooser =
/*#__PURE__*/
function () {
  function BlogCategoryChooser() {
    _classCallCheck(this, BlogCategoryChooser);

    this._links = document.querySelectorAll('.blog-pills__list__item');
    this.chosenCategory = this.chosenCategory.bind(this);
    this.updatePosts = this.updatePosts.bind(this);
    this.addEventListeners();
  }

  _createClass(BlogCategoryChooser, [{
    key: "addEventListeners",
    value: function addEventListeners() {
      var self = this;
      [].forEach.call(this._links, function (link) {
        link.addEventListener('click', self.chosenCategory, true);
      });
    }
  }, {
    key: "getSlug",
    value: function getSlug(href) {
      var segments = href.split('/');
      return segments[segments.length - 1];
    }
  }, {
    key: "chosenCategory",
    value: function chosenCategory(event) {
      this.updateActivePills(event);
      event.preventDefault();
      event.stopPropagation();
      var currentPosts = this.getCards();
      [].forEach.call(currentPosts, function (post) {
        post.classList.add('blog-cards__card--blurred');
      });

      if (event.target.getAttribute('href') == null) {
        return;
      }

      var slug = this.getSlug(event.target.getAttribute('href'));
      var title = event.target.innerText;
      var self = this;
      var href = event.target.getAttribute('href');
      this.getJSON('/api/posts/' + slug, function (data) {
        self.updatePosts(data);
      }, function (status) {
        // if the api does not respons well we send user to the web route instead
        window.location.href = href;
      });
      self.updateUrl(title, href);
    }
  }, {
    key: "updateActivePills",
    value: function updateActivePills(event) {
      var classActive = 'blog-pills__list__item--active';
      document.querySelector("." + classActive).classList.remove(classActive);
      event.target.parentElement.classList.add(classActive);
    }
  }, {
    key: "updatePosts",
    value: function updatePosts(newPostsData) {
      var currentPosts = this.getCards();
      var parent = this.getContainer();
      var self = this;
      var cards = [];
      newPostsData.forEach(function (post, index) {
        if (currentPosts[index] == null) {
          // make new
          document.querySelector('.blog-cards').appendChild(currentPosts[currentPosts.length - 1].cloneNode(true));
        }
      });

      for (var i = currentPosts.length; i > newPostsData.length; i--) {
        parent.removeChild(currentPosts[i - 1]);
      }

      this.getCards().forEach(function (htmlPost, index) {
        self.whichTransitionEvent() && htmlPost.addEventListener(self.whichTransitionEvent(), function () {
          if (newPostsData[index] !== undefined) {
            self.replaceTextOnCard(htmlPost, newPostsData[index]);
            self.updateCommentCount(htmlPost, newPostsData[index]);
            htmlPost.classList.remove('blog-cards__card--blurred');
          }
        });
      });
      setTimeout(function () {
        Array.from(self.getCards(), function (card) {
          card.classList.remove('blog-cards__card--blurred');
        });
      }, 1500);
      return Promise.resolve();
    }
  }, {
    key: "replaceTextOnCard",
    value: function replaceTextOnCard(htmlPost, postData) {
      var contentContainer = htmlPost.querySelector('.blog-cards__card__text-container');
      var content = contentContainer.querySelector('.content');
      var title = contentContainer.querySelector('.title');
      content.textContent = postData.content.substring(0, 100) + '...';
      title.textContent = postData.title;
    }
  }, {
    key: "getContainer",
    value: function getContainer() {
      return document.querySelector('.blog-cards');
    }
  }, {
    key: "getCards",
    value: function getCards() {
      return document.querySelectorAll('.blog-cards__card');
    }
  }, {
    key: "getJSON",
    value: function getJSON(url, successHandler, errorHandler) {
      var xhr = typeof XMLHttpRequest !== 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
      xhr.open('get', url, true);
      xhr.responseType = 'json';

      xhr.onreadystatechange = function () {
        var status;
        var data; // https://xhr.spec.whatwg.org/#dom-xmlhttprequest-readystate

        if (xhr.readyState === 4) {
          // `DONE`
          status = xhr.status;

          if (status === 200) {
            successHandler && successHandler(xhr.response);
          } else {
            errorHandler && errorHandler(status);
          }
        }
      };

      xhr.send();
    }
    /* From Modernizr */

  }, {
    key: "whichTransitionEvent",
    value: function whichTransitionEvent() {
      var t;
      var el = document.createElement('fakeelement');
      var transitions = {
        'transition': 'transitionend',
        'OTransition': 'oTransitionEnd',
        'MozTransition': 'transitionend',
        'WebkitTransition': 'webkitTransitionEnd'
      };

      for (t in transitions) {
        if (el.style[t] !== undefined) {
          return transitions[t];
        }
      }
    }
  }, {
    key: "updateCommentCount",
    value: function updateCommentCount(post, newPostsData) {
      var commentSection = post.querySelector('.blog-cards__card__comment-section');
      var bubble = commentSection.querySelector('.blog-cards__card__comment-bubble');

      if (newPostsData.commentCount !== undefined) {
        bubble.innerText = newPostsData.commentCount;
      }
    }
  }, {
    key: "updateUrl",
    value: function updateUrl(title, href) {
      console.log(title, href);
      history.pushState(null, title, href);
    }
  }]);

  return BlogCategoryChooser;
}();

new BlogCategoryChooser();

/***/ }),

/***/ "./app/Modules/Blog/Presentation/Assets/js/components/top-bar.js":
/*!***********************************************************************!*\
  !*** ./app/Modules/Blog/Presentation/Assets/js/components/top-bar.js ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var topBar =
/*#__PURE__*/
function () {
  function topBar() {
    _classCallCheck(this, topBar);

    this._topBar = document.querySelector('.top-bar');

    this._topBar.classList.add("top-bar--allow-scroll");

    this.onScroll = this.onScroll.bind(this);
    this.addEventListeners();
  }

  _createClass(topBar, [{
    key: "addEventListeners",
    value: function addEventListeners() {
      window.addEventListener('scroll', this.onScroll);
    }
  }, {
    key: "onScroll",
    value: function onScroll() {
      if (window.scrollY > 0) {
        this._topBar.classList.add('top-bar--scrolled');
      } else {
        this._topBar.classList.remove('top-bar--scrolled');
      }
    }
  }]);

  return topBar;
}();

new topBar();

/***/ }),

/***/ 2:
/*!**************************************************************!*\
  !*** multi ./app/Modules/Blog/Presentation/Assets/js/app.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Code\larswiegers.nl-blog\app\Modules\Blog\Presentation\Assets\js\app.js */"./app/Modules/Blog/Presentation/Assets/js/app.js");


/***/ })

/******/ });