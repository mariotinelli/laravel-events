@extends('layouts.home.master')

@section('title', 'Criar Evento')

@section('content')

    <div class="d-flex" style="gap: 40px">
        <div class="event-show-image">
            <img src="{{asset("storage/$event->image")}}" alt="Imagem do Evento">
        </div>
        <div class="event-show-infos d-flex flex-column justify-content-between">
            <h3 class="mb-3">{{$event->title}}</h3>

            <div class="row">
                <div class="col-5">
                    <p>
                        <i class="fa-solid fa-user-large"></i>
                        {{explode(' ', $event->user->name)[0]}}
                    </p>
                    <p>
                        <i class="fa-solid fa-calendar-days"></i>
                        {{\Carbon\Carbon::parse($event->date)->format('d/m/Y')}}
                    </p>
                </div>
                <div class="col-7">
                    <p>
                        <i class="fa-solid fa-user-group"></i>
                        {{$event->participants . '/' . $event->capacity . ' Participantes'}}
                    </p>
                    <p>
                        <i class="fa-solid fa-clipboard-list"></i>
                        {{$event->event_category->name}}
                    </p>
                </div>
            </div>
            <p>
                <i class="fa-solid fa-location-dot"></i>
                {{ $eventAddress }}
            </p>

            <a class="btn btn-primary w-50">Confirmar presença</a>
        </div>
    </div>

    <div class="mt-4 w-75">
        {{$event->description}}
    </div>

@endsection
