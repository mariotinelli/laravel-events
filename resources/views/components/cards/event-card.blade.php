<div class="card d-flex flex-column" style="height: 321px">
    <div class="card-header p-0 event-card-img" >
        <img src="{{asset("storage/$event->image")}}" alt="Imagem do Evento">
    </div>
    <div class="card-body event-card-content">
        <h3>{{$event->title}}</h3>
        <h6> {{\Carbon\Carbon::parse($event->date)->format('d/m/Y')}}</h6>
        <p>{{$event->description}}</p>
        <a href="{{route('events.show', $event->id_event)}}" class="btn btn-success">Saber mais</a>
    </div>
</div>
