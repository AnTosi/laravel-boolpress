<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\MarkdownContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Mail;

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

        // return (new MarkdownContactFormMail($validated_data))->render();
        // ddd($validated_data);
        // return (new ContactFormMail($validated_data))->render();
        Mail::to('admin@example.com')->send(new MarkdownContactFormMail($validated_data));

        return redirect()->back()->with('feedback', 'Thanks for your message!');
    }
}
