<?php

namespace App\Http\Controllers;
use App\Models\Contact;

 use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        //Retrieve all contacts from the database
        $contacts = Contact::all();

       //pass the contact to the view
       return view('home', compact('contacts'));
    }
}
