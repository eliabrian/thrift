<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menus = [
            'home' => [
                'name' => 'Home',
                'route' => 'home'
            ],
            'login' => [
                'name' => 'Login',
                'route' => 'auth.login'
            ],
        ];

        $admin = [
            'products' => [
                'name' => 'Products',
                'route' => 'admin.product.index',
            ]
        ];

        return view('components.navbar', compact('menus', 'admin'));
    }
}
