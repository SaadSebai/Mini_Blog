<nav class="nav-wrapper indigo">
    <div class="container">
        <a href="{{ route('home') }}" class="brand-logo">Mini Blogger</a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
            <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
            @include('partials.menuslinks')
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-links">
    @include('partials.menuslinks')
</ul>
