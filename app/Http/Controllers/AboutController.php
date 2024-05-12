<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function render(Request $request)
    {
        $data = array();

        return view('livewire.about', $data);
    }
}
