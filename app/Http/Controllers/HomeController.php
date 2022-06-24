<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search', '');
        $filterDateFrom = $request->get('filter-date-from', '');
        $filterDateTo = $request->get('filter-date-to', '');
        $filterCategory = $request->get('filter-category', 0);

        $query = Event::query();

        $where = $filterCategory > 0 ? $query->where('id_event_category', '=', $filterCategory) : $query->where('id_event_category', '>', 0);

        if ($filterDateFrom && $filterDateTo) {
            $query->whereDate('date', '>=', $filterDateFrom);
            $query->whereDate('date', '<=', $filterDateTo);
        }
        else if ($filterDateFrom) {
            $query->whereDate('date', '>=', $filterDateFrom);
        }
        else if ($filterDateTo) {
            $query->whereDate('date', '<=', $filterDateTo);
        }


        $events = $query->where([
            ['title', 'like', "%{$search}%"],
        ])->get();

        $categories = EventCategory::all();

        return view('welcome', compact('events', 'categories', 'search', 'filterDateFrom', 'filterDateTo', 'filterCategory'));
    }

    public function returnEventsByFilter(Request $request){

        $search =  $request->search ?? '';
        $filterDateFrom = $request->filterDateFrom ?? '';
        $filterDateTo = $request->filterDateTo ?? '';
        $filterCategory = $request->filterCategory ?? 0;

        $query = Event::query();

        $filterCategory > 0 ? $query->where('id_event_category', '=', $filterCategory) : $query->where('id_event_category', '>', 0);

        if ($filterDateFrom && $filterDateTo) {
            $query->whereDate('date', '>=', $filterDateFrom);
            $query->whereDate('date', '<=', $filterDateTo);
        }
        else if ($filterDateFrom) {
            $query->whereDate('date', '>=', $filterDateFrom);
        }
        else if ($filterDateTo) {
            $query->whereDate('date', '<=', $filterDateTo);
        }

        $events = $query->where([
            ['title', 'like', "%{$search}%"],
        ])->get();

        $output = [];
        foreach($events as $event){

            $values = [
                'event' => $event
            ];

            array_push($output, View::make("components.cards.event-card", $values)->render());
        }

        session()->put('filter', count($output));

        return response()->json($output);
    }

}
