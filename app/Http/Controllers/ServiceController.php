<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $services = Service::with('sousservices')->get();

            $servicesousservices = $services->map(function ($service) {
                return [
                    'id' => $service->id,
                    'name' => $service->name,
                    'description' => $service->description,
                    'image' => $service->image,
                    'sousservices' => $service->sousservices->map(function ($sousservice) {
                        return [
                            'sousservice_id' => $sousservice->id,
                            'sousservice_name' => $sousservice->name,
                            'sousservice_description' => $sousservice->description,
                            'sousservice_image' => $sousservice->image
                        ];
                    })->toArray(),
                ];
            })->toArray();

            return response()->json($servicesousservices);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération des services'
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
            $service = Service::with('sousServices')->where('id', $request->id)->get()->toArray();

            return response()->json($service);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la récupération du service'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
