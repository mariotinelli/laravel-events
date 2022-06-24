@php
    $filter = session()->get('filter') ?? null;
    session()->forget('filter');
@endphp

@extends('layouts.home.master')

@section('title', 'Dashboard')

@section('content')

    <div class="events-list-container mb-4">

        <h3 class="next-events">Próximos eventos</h3>
        <h3 class="filter-events d-none">Resultado da busca</h3>

        <div class="events-list cards h-100 pr-2">
            @if(count($events) > 0)
                @foreach ($events as $event)
                    <x-cards.event-card
                        :event="$event"
                    />
                @endforeach
            @else
                <p>Sem eventos</p>
            @endif
        </div>

    </div>

    <div class="events-list-load d-none">
        <div class="preloader-wrapper events-loader">
            <svg class="circlespinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>

@endsection
