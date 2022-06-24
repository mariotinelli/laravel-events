@extends('layouts.events.master')

@section('title', 'Meus Eventos')

@section('content')

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Participantes</th>
                <th scope="col">Capacidade</th>
                <th scope="col">Data</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (count($events) > 0)
                @foreach ($events as $event)
                    <tr>
                        <th scope="row">{{$event->id_event}}</th>
                        <td style="width: 6%">
                            <img src="{{asset("storage/$event->image")}}" alt="Imagem do Evento" style="width: 62%">
                        </td>
                        <td class="w-25">{{$event->title}}</td>
                        <td class="table-8-percent">{{$event->participants}}</td>
                        <td class="table-8-percent">{{$event->capacity}}</td>
                        <td class="table-8-percent">{{$event->date}}</td>
                        <td class="w-25">{{$event->description}}</td>

                        <td class="d-flex" style="gap: 10px">
                            <a href="{{route('events.edit', $event)}}" class="btn btn-primary">
                                <i class="fas fa-pen mr-3"></i>
                                Editar
                            </a>
                            <form method="POST" action="{{route('events.destroy', $event)}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-ban mr-3"></i>
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h4>Você não possui eventos criados.</h4>
            @endif
        </tbody>
    </table>

@endsection
