<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $formations = Formation::all()->toArray();

            return response()->json($formations);

        } catch (\Exception $e) {
            echo $e;
            return response()->json([
                'error' => 'Erreur lors de la récupération des formations',
            ]);
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $formation = Formation::where('id', $request->id)->get()->toArray();

            return response()->json($formation);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération des formations'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        //
    }

    public function getformation() {
        try {
            $formations = Formation::orderBy('created_at', 'desc')->limit(3)->get()->toArray();

            return response()->json($formations);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération des formations'
            ]);
        }
    }
}
