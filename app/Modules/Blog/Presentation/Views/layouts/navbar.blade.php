<section class="top-bar">
    <input type="checkbox" class="top-bar__nav-checkbox" id="top-bar__nav-checkbox" name="top-bar__nav-checkbox">
    <section class="top-bar__nav-mobile">
        <label for="top-bar__nav-checkbox" title="mobile menu">
            <i class="fa fa-bars" title="mobile menu"></i>
        </label>
    </section>
    <nav class="top-bar__nav">
        <a class="top-bar__nav__link" href="{{route('home')}}">Lars Wiegers</a>
        <a class="top-bar__nav__link" href="{{route('home')}}">Home</a>
        <a class="top-bar__nav__link" href="{{route('blog.index')}}">Blog</a>
        <a class="top-bar__nav__link" href="{{route('projects.index')}}">Projects</a>
        <a class="top-bar__nav__link" href="{{route('contact.index')}}">Contact</a>
    </nav>
    <section class="top-bar__actions">
        <a href="#" class="top-bar__actions__icon" title="search">
            <i class="fa fa-search" title="search"></i>
        </a>
        <a href="#" class="top-bar__actions__icon" title="linkedin">
            <i class="fa fa-linkedin" title="linkedin"></i>
        </a>
    </section>
    <section class="top-bar__actions__extra">
    </section>


</section>