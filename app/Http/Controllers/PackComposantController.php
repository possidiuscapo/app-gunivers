<?php

namespace App\Http\Controllers;

use App\Filament\Resources\PackResource;
use App\Models\Pack;
use App\Models\PackComposant;
use Illuminate\Http\Request;

class PackComposantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $packs = Pack::with('composants')->get();

            $packscomposants = $packs->map(function ($pack) {
                return [
                    'pack_id' => $pack->id,
                    'pack_name' => $pack->name,
                    'pack_price' => $pack->price,
                    'composants' => $pack->composants->map(function ($composant) {
                        return [
                            'composant_id' => $composant->id,
                            'composant_name' => $composant->name,
                            'composant_quantity' => $composant->quantity,
                            'composant_unity' => $composant->unity,
                        ];
                    })->toArray(),
                ];
            })->toArray();

            return response()->json($packscomposants);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération des packs'
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
    public function show(PackComposant $packComposant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackComposant $packComposant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackComposant $packComposant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackComposant $packComposant)
    {
        //
    }
}
