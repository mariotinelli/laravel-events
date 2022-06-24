<nav class="px-5 py-2 bg-dark position-sticky w-100" style="top: 0; z-index: 1">
    <div class="row justify-content-between align-items-center">
        <a href="#" class="col-2 logo">
            <img src="/assets/logo.png" alt="logo">
        </a>
        <div class="col-5 search">
            <form class="d-flex">
                <input type="text" name="search" id="search" value="{{ $search ?? '' }}" placeholder="Busque um evento">
                <button type="submit" class="btn btn-secondary ms-1 active-filter">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <ul class="col-3 links">
            <a href="{{route('home')}}">Eventos</a>
            @auth
                <a href="{{route('events.index')}}">Meus Eventos</a>
                <a href="{{route('events.create')}}">Criar Evento</a>
                <a href="{{ route('logout') }}" target="_self" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @endauth
            @guest
                <a href="{{route('login')}}">Login</a>
                <a href="{{route('register')}}">Register</a>
            @endguest
        </ul>
    </div>
</nav>
