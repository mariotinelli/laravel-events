<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class EventCard extends Component
{
    /**
     * Event
     *
     * @var Event
     */
    public $event;

    /**
     * Create a new component instance.
     *
     * @param  Event  $event
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.event-card');
    }
}
