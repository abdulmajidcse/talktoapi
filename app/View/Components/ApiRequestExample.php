<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ApiRequestExample extends Component
{
    public $apiUrl, $method, $formDataIs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($apiUrl, $method, $formDataIs = false)
    {
        $this->apiUrl = $apiUrl;
        $this->method = $method;
        $this->formDataIs = $formDataIs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.api-request-example');
    }
}
