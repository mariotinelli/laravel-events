<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Models\Event;
use App\Models\EventAddress;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $event_categories = EventCategory::pluck('name', 'id_event_category');

        return view('app.events.create', compact('event_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request, Event $event)
    {
        $validated = $request->validated();

        $validated['participants'] = 0;
        $event = Event::create($validated);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store("image/events/$event->id_event", 'public');
            $event->image = $filePath;
        }

        $event_address = EventAddress::firstOrCreate([
            'event_cep' => $request->event_cep,
            'event_city' => $request->event_city,
            'event_state' => $request->event_state,
            'event_address' => $request->event_address,
            'event_address_district' => $request->event_address_district,
            'event_address_number' => $request->event_address_number
        ]);

        $event->id_event_address = $event_address->id_event_address;

        $event->save();

        session()->put('success', 'Evento criado com sucesso!');
        return response()->json(['route' => route('home')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
