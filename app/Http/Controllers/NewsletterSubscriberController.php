<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Exception;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
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
                'email' => 'required|string|email|max:255|unique:newsletter_subscribers',
                'status' => 'nullable|boolean',
            ]);

            $newsletterSubscriber = NewsletterSubscriber::create($request->all());

            return response()->json([
                'success' => 'Enregistrer avec succès'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de l\'enregistrement'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }
}
