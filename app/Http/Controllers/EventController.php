<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
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
    public function index(Request $request)
    {

        $user = auth()->user();
        $events = Event::where('id_user', $user->id_user)->get();

        return view('app.events.index', compact('events'));
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
        $user = auth()->user();

        $validated['participants'] = 0;
        $validated['id_user'] = $user->id_user;

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
        return response()->json(['route' => route('events.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        $event = Event::findorFail($event->id_event);
        $categories = EventCategory::all();
        $eventAddress = $event->event_address->event_address . ', ' .
                        $event->event_address->event_address_number . ', ' .
                        $event->event_address->event_address_district .' - ' .
                        $event->event_address->event_city . '/' .
                        $event->event_address->event_state;

        return view('app.events.show', compact('event', 'eventAddress', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {

        $event_categories = EventCategory::pluck('name', 'id_event_category');
        $event = Event::findOrFail($event->id_event)
            ->join('event_address', 'event_address.id_event_address', '=', 'events.id_event_address')
            ->first();

        return view('app.events.edit', compact('event', 'event_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // Delete image
            $file = asset("storage/$event->image");
            $fileParts = explode('/', $file);
            $fileName = array_pop($fileParts);
            $success =  Storage::disk('public')->delete("image/events/$event->id_event/$fileName");
            $file = $request->file('image');
            $filePath = $file->store("image/events/$event->id_event", 'public');
            $validated['image'] = $filePath;
        }

        $event_address = EventAddress::firstOrCreate([
            'event_cep' => $request->event_cep,
            'event_city' => $request->event_city,
            'event_state' => $request->event_state,
            'event_address' => $request->event_address,
            'event_address_district' => $request->event_address_district,
            'event_address_number' => $request->event_address_number
        ]);

        $validated['id_event_address'] = $event_address->id_event_address;

        $event->update($validated);

        session()->put('success', 'Evento editado com sucesso!');
        return response()->json(['route' => route('events.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $file = asset("storage/$event->image");
        $fileParts = explode('/', $file);
        $fileName = array_pop($fileParts);
        $success =  Storage::disk('public')->delete("image/events/$event->id_event/$fileName");

        if ($success) {
            $event->delete();
        }

        session()->put('success', 'Evento excluido com sucesso!');
        return redirect()->route('events.index');
    }

}
