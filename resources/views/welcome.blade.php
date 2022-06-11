@extends('layouts.home')

@section('title', 'Home')

@section('content')

    <div class="home-container">

        <div class="w-25 pe-5">
            <h3 class="mb-4">Filtros</h3>
            <div class="filter-date">
                <form action="">

                    <label class="form-label" for="">De</label>
                    <input class="form-control" type="text">

                    <label class="form-label" for="">Até</label>
                    <input class="form-control mb-2" type="text">

                    <button type="submit" class="btn btn-dark  w-100">Pesquisar</button>
                </form>
            </div>

            <div class="filter-categories mt-4">
                <h5 class="mb-4">Categorias</h5>
                <form class="list-group">
                    <button type="submit" class="list-group-item list-group-item-action list-group-item-dark active"> Comercial </button>
                    <button type="submit" class="list-group-item list-group-item-action list-group-item-dark"> Cultural </button>
                    <button type="submit" class="list-group-item list-group-item-action list-group-item-dark"> Social </button>
                    <button type="submit" class="list-group-item list-group-item-action list-group-item-dark"> Politico </button>
                    <button type="submit" class="list-group-item list-group-item-action list-group-item-dark"> Gastronômico </button>
                    <button type="submit" class="list-group-item list-group-item-action list-group-item-dark"> Religioso </button>
                </form>
            </div>
        </div>

        <div class="w-75 h-100">
            <h3 class="mb-4">Próximos eventos</h3>

            <div class="cards h-100 pr-2">
                @foreach ($events as $event)
                    <x-cards.event-card
                        :event="$event"
                    />
                @endforeach
            </div>

        </div>

    </div>

@endsection
