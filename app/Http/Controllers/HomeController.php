<?php

namespace App\Http\Controllers;

use App\Models\User\Role;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (!auth()->check()) {
            return view('welcome');
        } else if (in_array(auth()->user()->role->id, Role::ADMINS)) {
            return redirect()->route('dashboard');
        } else if (in_array(auth()->user()->role->id, Role::DISTRIBUTORS)) {
            return redirect()->route('product.product.index');
        } else {
            abort(404);
        }
    }
}
