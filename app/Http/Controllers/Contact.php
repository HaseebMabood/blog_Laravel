<?php

namespace App\Http\Controllers;

use App\Mail\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contact extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to('haseebmabood2017@gmail.com')->send(new Contacts($data));




        return redirect(route('contact.index'))->with('success', "Thank you, we'll be in touch soon");
    }
}
