class BlogCategoryChooser {
    constructor() {
        this._links = document.querySelectorAll('.blog-pills__list__item');
        this.chosenCategory = this.chosenCategory.bind(this);
        this.updatePosts = this.updatePosts.bind(this);
        this.addEventListeners();

    }

    addEventListeners() {
        const self = this;
        [].forEach.call(this._links, function (link) {
            link.addEventListener('click', self.chosenCategory, true);
        });
    }

    getSlug(href) {
        let segments = href.split('/');
        return segments[segments.length - 1];
    }

    chosenCategory(event) {

        this.updateActivePills(event);

        event.preventDefault();
        event.stopPropagation();
        let currentPosts = this.getCards();
        [].forEach.call(currentPosts, function (post) {
            post.classList.add('blog-cards__card--blurred');
        });
        if (event.target.getAttribute('href') == null) {
            return;
        }
        let slug = this.getSlug(event.target.getAttribute('href'));
        let title = event.target.innerText;
        let self = this;
        let href = event.target.getAttribute('href');

        this.getJSON('/api/posts/' + slug, function (data) {
            self.updatePosts(data)
        }, function (status) {
            // if the api does not respons well we send user to the web route instead
            window.location.href = href;
        });
        self.updateUrl(title, href);
    }

    updateActivePills(event) {
        let classActive = 'blog-pills__list__item--active';
        document.querySelector("." + classActive).classList.remove(classActive);
        event.target.parentElement.classList.add(classActive);
    }

    updatePosts(newPostsData) {
        let currentPosts = this.getCards();
        let parent = this.getContainer();
        let self = this;
        let cards = [];

        newPostsData.forEach(function (post, index) {
            if (currentPosts[index] == null) {
                // make new
                document.querySelector('.blog-cards').appendChild(
                    currentPosts[currentPosts.length - 1].cloneNode(true));
            }
        });

        for (let i = currentPosts.length; i > newPostsData.length; i--) {
            parent.removeChild(currentPosts[i - 1]);
        }

        this.getCards().forEach(function (htmlPost, index) {
            self.whichTransitionEvent() && htmlPost.addEventListener(
                self.whichTransitionEvent(), function () {
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

    replaceTextOnCard(htmlPost, postData) {
        let contentContainer = htmlPost.querySelector('.blog-cards__card__text-container');
        let content = contentContainer.querySelector('.content');
        let title = contentContainer.querySelector('.title');
        content.textContent = postData.content.substring(0, 100) + '...';
        title.textContent = postData.title;
    }

    getContainer() {
        return document.querySelector('.blog-cards');
    }

    getCards() {
        return document.querySelectorAll('.blog-cards__card');
    }

    getJSON(url, successHandler, errorHandler) {
        let xhr = typeof XMLHttpRequest !== 'undefined'
            ? new XMLHttpRequest()
            : new ActiveXObject('Microsoft.XMLHTTP');
        xhr.open('get', url, true);
        xhr.responseType = 'json';
        xhr.onreadystatechange = function () {
            let status;
            let data;
            // https://xhr.spec.whatwg.org/#dom-xmlhttprequest-readystate
            if (xhr.readyState === 4) { // `DONE`
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
    whichTransitionEvent() {
        let t;
        let el = document.createElement('fakeelement');
        let transitions = {
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

    updateCommentCount(post, newPostsData) {
        let commentSection = post.querySelector('.blog-cards__card__comment-section');
        let bubble = commentSection.querySelector('.blog-cards__card__comment-bubble');
        if (newPostsData.commentCount !== undefined) {
            bubble.innerText = newPostsData.commentCount;
        }
    }

    updateUrl(title, href) {
        console.log(title, href);
        history.pushState(null, title, href);
    }
}

new BlogCategoryChooser();
