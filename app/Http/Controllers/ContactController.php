<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {

        $sort = $request->query('sort', 'asc'); // Default to ascending order

        $contacts = Contact::orderBy('name', $sort)->get();

        return view('home', compact('contacts', 'sort'));
    
        // Method to display all contacts
        // $contacts = Contact::all();
        // return view('home', compact('contacts'));
    }

    public function create()
    {
        // Method to show the create form
        return view('layouts.createContact');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email:rfc,dns|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            
        ]);

        // Combine first and last name into a single "name" column
        $name = $validatedData['firstName'] . ' ' . $validatedData['lastName'];

        // Combine country code and phone number
        $phoneNumber = $validatedData['number'];

        // Create a new Contact instance
        $contact = new Contact();
        $contact->name = $name;
        $contact->number = $phoneNumber;
        $contact->email = $validatedData['email'];

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Save the $imageName in the database, not the entire path
            $contact->image = $imageName;
        } else {
            // Set a default image if no image is uploaded
            $contact->image = 'images.png'; // Path to your default image
        }

        // Save the contact
        $contact->save();

        return redirect(url('/'))
            ->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('layouts.view', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        // Method to show the edit form
        return view('layouts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email:rfc,dns|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Combine first and last name into a single "name" column
        $name = $validatedData['firstName'] . ' ' . $validatedData['lastName'];

        // Update contact details
        $contact->name = $name;
        $contact->number = $validatedData['number'];
        $contact->email = $validatedData['email'];

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Delete the old image if it's not the default
            if ($contact->image != 'images.png') {
                $oldImagePath = public_path('images/' . $contact->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
                // Save the new image name
            $contact->image = $imageName;
         }
        

        // Save the contact
        $contact->save();


        return redirect(url('/'))
            ->with('success', 'Contact edited successfully.');
    }
    
    public function destroy(Contact $contact){

         // Delete the contact's image if it's not the default
        if ($contact->image != 'images.png') {
            $imagePath = public_path('images/' . $contact->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        //delete the contact
        $contact->delete();

       
        return redirect(url('/'))
            ->with('success', 'Contact edited successfully.');
    }
}