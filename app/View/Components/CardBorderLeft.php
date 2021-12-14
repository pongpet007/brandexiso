<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardBorderLeft extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $title;
    public $amount;
    public $icon;


    public function __construct($type, $title = "", $amount = "", $icon = 'fas fa-calendar fa-2x text-gray-300')
    {
        $this->type = $type;
        $this->title = $title;
        $this->amount = $amount;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-border-left');
    }
}
