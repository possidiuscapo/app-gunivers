<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Models\NewsletterUnsubscription;
use Illuminate\Http\Request;

class NewsletterUnsubscriptionController extends Controller
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
                'reason' => 'required|string|max:255',
                'newsletter_subscriber_id' => 'required|integer|exists:newsletter_subscribers,id',
            ]);

            $newsletterUnsubscription = NewsletterUnsubscription::create($request->all());

            $newsletterSubscriber = NewsletterSubscriber::findOrFail($request->newsletter_subscriber_id);
            $newsletterSubscriber->status = 0;
            $newsletterSubscriber->update();

            return response()->json([
                'success' => 'Désinscription effectué avec succès'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la désinscription'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsletterUnsubscription $newsletterUnsubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsletterUnsubscription $newsletterUnsubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsletterUnsubscription $newsletterUnsubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsletterUnsubscription $newsletterUnsubscription)
    {
        //
    }
}
