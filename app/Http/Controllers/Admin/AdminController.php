<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visitor;

class AdminController extends Controller
{


    /**
     * Show the main page admin panel
     */
    public function index()
    {

        $users = User::all();
        $visitors = Visitor::where('date', today())->count();

        return view('admin.index', compact('users', 'visitors'));
    }
}
