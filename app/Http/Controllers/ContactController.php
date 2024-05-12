<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function render(Request $request)
    {
        $data = array();

        return view('livewire.contact', $data);
    }
}
