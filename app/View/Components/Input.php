<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * The input type.
     * 
     * @var string
     */
    public $type;

    /**
     * The input name.
     * 
     * @var string
     */
    public $name;

    /**
     * The input id.
     * 
     * @var string
     */
    public $id;

    /**
     * The label name.
     * 
     * @var string
     */
    public $label;

    /**
     * The label name.
     * 
     * @var string
     */
    public $value;

    

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $name
     * @param string $id
     * @param string $label
     * @param string $value
     * @return void
     */
    public function __construct($type, $name, $id, $label, $value = '')
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
