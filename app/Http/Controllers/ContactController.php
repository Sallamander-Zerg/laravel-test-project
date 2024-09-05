<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use App\Models\Contact; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'required',
        ]);

        $contact = Contact::create($request->all());

        Mail::to('admin@example.com')->send(new ContactMail($contact));

        

        return response()->json(['success' => true]);
    }
}
