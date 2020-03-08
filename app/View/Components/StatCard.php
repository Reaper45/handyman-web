<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatCard extends Component
{
    public $icon;

    public $title;

    public $value;

    public $to;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $icon, $value, $to)
    {
        $this->icon = $icon;
        $this->value = $value;
        $this->to = $to;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.stat-card');
    }
}
