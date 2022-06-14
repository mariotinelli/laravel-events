@extends('layouts.home.master')

@section('title', 'Criar Evento')

@section('content')

    <div class="d-flex" style="gap: 40px">
        <div class="event-show-image">
            <img src="http://cbissn.ibict.br/images/phocagallery/galeria2/thumbs/phoca_thumb_l_image03_grd.png" alt="Teste">
        </div>
        <div class="event-show-infos d-flex flex-column justify-content-between">
            <h3 class="mb-3">{{$event->title}}</h3>

            <div class="row">
                <div class="col-5">
                    <p>
                        <i class="fa-solid fa-user-large"></i>
                        Dono
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
                {{
                    $event->event_address->event_address . ', ' .
                    $event->event_address->event_address_number . ', ' .
                    $event->event_address->event_address_district .' - ' .
                    $event->event_address->event_city . '-' .
                    $event->event_address->event_state
                }}
            </p>

            <a class="btn btn-primary w-50">Confirmar presença</a>
        </div>
    </div>

    <div class="mt-4 w-75">
        {{$event->description}}
    </div>

@endsection
