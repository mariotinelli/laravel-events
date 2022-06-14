<nav class="px-5 py-2 bg-dark position-sticky w-100" style="top: 0; z-index: 1">
    <div class="row justify-content-between align-items-center">
        <a href="#" class="col-2 logo">
            <img src="/assets/logo.png" alt="logo">
        </a>
        <div class="col-5 search">
            <input type="text" placeholder="Busque um evento">
        </div>
        <ul class="col-3 links">
            <a href="#">Eventos</a>
            <a href="#">Meus Eventos</a>
            <a href="{{route('events.create')}}">Criar Evento</a>
            <a href="#">Logout</a>
        </ul>
    </div>
</nav>
