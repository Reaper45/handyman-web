<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobComponent extends Component
{
    public $job;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.job');
    }
}
