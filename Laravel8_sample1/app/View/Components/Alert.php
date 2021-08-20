<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $color;
    public $title;
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color="yellow", $title="", $text="")
    {
        $this->color = $color;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
