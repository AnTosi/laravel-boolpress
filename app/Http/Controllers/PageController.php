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

    public function sendContactForm(Request $request)
    {
        # code...
        // ddd($request->all());
        $validated_data = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'required|email',
            'message' => 'required|min:10|max:500'
        ]);

        // ddd($validated_data);
    }
}
