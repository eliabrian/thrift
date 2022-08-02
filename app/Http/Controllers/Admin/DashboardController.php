<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (! Gate::allows('dashboard', auth()->user())) {
            abort(404);
        }

        return view('admin.dashboard');
    }
}
