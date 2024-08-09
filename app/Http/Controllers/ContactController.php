<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {


            $request->validate([
                    'lastname' => 'required|string|max:255',
                    'firstname' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:contacts',
                    'telephone' => 'required|string|max:255',
                    'message' => 'required|string',
                ]);

                // $contact = Contact::create($request->all());
                $contact = new Contact();

                $contact->lastname = $request->lastname;
                $contact->firstname = $request->firstname;
                $contact->email = $request->email;
                $contact->telephone = $request->telephone;
                $contact->message = $request->message;

                $contact->save();

            return response()->json([
                'success' => 'Enregistrer avec succès'
            ]);

        } catch (Exception $e) {
            // Gestion des autres exceptions
            return response()->json([
                'error' => 'Erreur lors de l\'enregistrement'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
