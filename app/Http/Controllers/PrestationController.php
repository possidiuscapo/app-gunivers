<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // $prestation = Prestation::with('typesPrestation')->get()->toArray();

            // // dd($prestation);

            // return response()->json($prestation);

            $prestation = Prestation::with('typesPrestation')->get()->toArray();

            $prestationEncrypted = array_map(function ($item) {
                $item['id'] = encrypt($item['id']);
                return $item;
            }, $prestation);

            return response()->json($prestation);
            // return response()->json($prestationEncrypted);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération des prestations'
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
            $prestation = Prestation::with('typesPrestation')
                ->where('id', $request->id)
                ->get()
                ->toArray();

            return response()->json($prestation);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération des prestations' . $e
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestation $prestation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestation $prestation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestation $prestation)
    {
        //
    }
}
