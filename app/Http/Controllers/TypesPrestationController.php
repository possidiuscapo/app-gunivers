<?php

namespace App\Http\Controllers;

use App\Models\TypesPrestation;
use Illuminate\Http\Request;

class TypesPrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $typeprestation = TypesPrestation::all()->toArray();

            return response()->json($typeprestation);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération des types de prestation'
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
            $typeprestation = TypesPrestation::where('id', $request->id)->get()->toArray();

            return response()->json($typeprestation);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération du type de prestation'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypesPrestation $TypesPrestation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypesPrestation $TypesPrestation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypesPrestation $TypesPrestation)
    {
        //
    }
}
