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
__webpack_require__(4);
module.exports = __webpack_require__(5);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
__webpack_require__(3);

/***/ }),
/* 2 */
/***/ (function(module, exports) {

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var topBar = function () {
	function topBar() {
		_classCallCheck(this, topBar);

		this._topBar = document.querySelector('.top-bar');
		this._topBar.classList.add("top-bar--allow-scroll");
		this.onScroll = this.onScroll.bind(this);
		this.addEventListeners();
	}

	_createClass(topBar, [{
		key: 'addEventListeners',
		value: function addEventListeners() {
			window.addEventListener('scroll', this.onScroll);
		}
	}, {
		key: 'onScroll',
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
/* 3 */
/***/ (function(module, exports) {

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var BlogCategoryChooser = function () {
	function BlogCategoryChooser() {
		_classCallCheck(this, BlogCategoryChooser);

		this._links = document.querySelectorAll('.blog-pills__list__item');
		this.chosenCategory = this.chosenCategory.bind(this);
		this.updatePosts = this.updatePosts.bind(this);
		this.addEventListeners();
	}

	_createClass(BlogCategoryChooser, [{
		key: 'addEventListeners',
		value: function addEventListeners() {
			var self = this;
			[].forEach.call(this._links, function (link) {
				link.addEventListener('click', self.chosenCategory, true);
			});
		}
	}, {
		key: 'getSlug',
		value: function getSlug(href) {
			var segments = href.split('/');
			return segments[segments.length - 1];
		}
	}, {
		key: 'chosenCategory',
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
			console.log(slug);
			this.getJSON('/api/blog/' + slug, this.updatePosts, function (status) {
				// if the api does not respons well we send user to the web route instead
				window.location.href = event.target.getAttribute('href');
			});
		}
	}, {
		key: 'updateActivePills',
		value: function updateActivePills(event) {
			var classActive = 'blog-pills__list__item--active';
			document.querySelector("." + classActive).classList.remove(classActive);
			event.target.parentElement.classList.add(classActive);
		}
	}, {
		key: 'updatePosts',
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

			self.getCards().forEach(function (htmlPost, index) {
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
		}
	}, {
		key: 'replaceTextOnCard',
		value: function replaceTextOnCard(htmlPost, postData) {
			var contentContainer = htmlPost.querySelector('.blog-cards__card__text-container');
			var content = contentContainer.querySelector('.content');
			var title = contentContainer.querySelector('.title');
			content.textContent = postData.content.substring(0, 100) + '...';
			title.textContent = postData.title;
		}
	}, {
		key: 'getContainer',
		value: function getContainer() {
			return document.querySelector('.blog-cards');
		}
	}, {
		key: 'getCards',
		value: function getCards() {
			return document.querySelectorAll('.blog-cards__card');
		}
	}, {
		key: 'getJSON',
		value: function getJSON(url, successHandler, errorHandler) {
			var xhr = typeof XMLHttpRequest !== 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			xhr.open('get', url, true);
			xhr.responseType = 'json';
			xhr.onreadystatechange = function () {
				var status = void 0;
				var data = void 0;
				// https://xhr.spec.whatwg.org/#dom-xmlhttprequest-readystate
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
		key: 'whichTransitionEvent',
		value: function whichTransitionEvent() {
			var t = void 0;
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
		key: 'updateCommentCount',
		value: function updateCommentCount(post, newPostsData) {
			var commentSection = post.querySelector('.blog-cards__card__comment-section');
			var bubble = commentSection.querySelector('.blog-cards__card__comment-bubble');
			if (newPostsData.commentCount !== undefined) {
				bubble.innerText = newPostsData.commentCount;
			}
		}
	}]);

	return BlogCategoryChooser;
}();

new BlogCategoryChooser();

/***/ }),
/* 4 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 5 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);