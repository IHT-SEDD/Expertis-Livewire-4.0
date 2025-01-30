<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <x-nav-link :active="request()->routeIs('login')" href="{{ url('/') }}"> Login </x-nav-link>
                <x-nav-link :active="request()->routeIs('register')" href="{{ url('/register') }}"> Register </x-nav-link>
            </ul>
        </div>
    </div>
</nav>
