class topBar {
    constructor() {
        this._topBar = document.querySelector('.top-bar');
        this._topBar.classList.add("top-bar--allow-scroll");
        this.onScroll = this.onScroll.bind(this);
        this.addEventListeners();

    }

    addEventListeners() {
        window.addEventListener('scroll', this.onScroll);
    }

    onScroll() {
        if (window.scrollY > 0) {
            this._topBar.classList.add('top-bar--scrolled');
        } else {
            this._topBar.classList.remove('top-bar--scrolled');
        }

    }
}

new topBar();
