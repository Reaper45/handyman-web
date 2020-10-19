<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatComponent extends Component
{
    public $title;

    public $value;

    public $to;

    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $icon, $to, $value)
    {
        $this->title = $title;
        $this->icon  = $icon;
        $this->to    = $to;
        $this->value = $value;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.stat');
    }
}
