<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $data = array();
        return view('layouts.app', $data);
    }

    public function render(Request $request)
    {
        $data = array();
        return view('livewire.home', $data);
    }
}
