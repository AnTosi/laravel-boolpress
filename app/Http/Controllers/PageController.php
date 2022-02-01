<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function contacts()
    {
        # code...
        return view('guest.contacts.form');
    }
}
