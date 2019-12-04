@extends("Home::layouts.welcome")
@section("body")
    <!-- Wrapper -->
    <div id="wrapper" class="divided">

        <!-- One -->
        <section class="banner style1 orient-left content-align-left image-position-left fullscreen onload-image-fade-in onload-content-fade-right">
            <div class="content">
                <h1>Lars Wiegers</h1>
                <p class="major">Zeer gepassioneerde programmeur die studeert bij Saxion in Deventer.
                <ul class="actions vertical">
                    <li><a href="{{route('blog.index')}}" class="button big wide smooth-scroll-middle">blog</a></li>
                </ul>
            </div>
            <div class="image">
                <img src="{{asset('images/home-images/banner.jpg')}}" alt="Person coding" />
            </div>
        </section>

        <!-- Two -->
        <section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in" id="first">
            <div class="content">
                <h2>Wie ben ik?</h2>
                <p>Ik ben een beginnend applicatieontwikkelaar in Apeldoorn die zich vooral richt op het de hele web development stack. Ik ben op dit moment bezig mij verder te ontwikkelen op dit gebied door een hbo opleiding te doen. Tijdens mijn vorige opleiding heb ik de mogelijkheid gekregen om mijn school te vertegenwoordigen op de Nederlandse wedstrijden van het mbo. Bij deze wedstrijden ben ik <b>4e van Nederland</b> geworden.</p>
            </div>
            <div class="image">
                <img src="{{asset('images/home-images/lars.jpg')}}" alt="Picture of me" />
            </div>
        </section>

        <!-- Three -->
        <section class="spotlight style1 orient-left content-align-left image-position-center onscroll-image-fade-in">
            <div class="content">
                <h2>Mijn werk</h2>
                <p>Het grootste gedeelte van mijn software projecten zijn te vinden op mijn  <a href="https://github.com/LarsWiegers">github</a>. Daarnaast ben ik ook nog actief op <a href="https://linkedin.com/in/larswiegers">linkedin</a>. Daarnaast kunt u mij ook nog mailen als u in contact wil komen : <a href="mailto:larswiegers@live.nl">larswiegers@live.nl</a></p>
            </div>
            <div class="image">
                <img src="{{asset('images/home-images/pic03.png')}}" alt="Picture of my code" />
            </div>
        </section>
        <!-- Footer -->
        <footer class="wrapper style1 align-center">
            <div class="inner">
                <ul class="icons">
                    <li><a href="https://github.com/LarsWiegers" class="icon style2 fa-github"><span class="label">Twitter</span></a></li>
                    <li><a href="https://linkedin.com/in/larswiegers" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="mailto:larswiegers@live.nl" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p>&copy; Lars Wiegers {{Carbon\Carbon::now()->year}}</p>
            </div>
        </footer>

    </div>
@endsection("body")
