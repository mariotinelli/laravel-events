@extends('layouts.home.master')

@section('title', 'Home')

@section('content')


    <h3 class="mb-4">Próximos eventos</h3>

    <div class="cards h-100 pr-2">
        @foreach ($events as $event)
            <x-cards.event-card
                :event="$event"
            />
        @endforeach
    </div>

@endsection
