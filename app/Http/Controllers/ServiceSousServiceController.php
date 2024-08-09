<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSousService;
use App\Models\SousService;
use Illuminate\Http\Request;

class ServiceSousServiceController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {

            $service = ServiceSousService::where('service_id', $request->id)->get()->toArray();
            $servicesousservice = Service::with('sousServices')->where('id', $request->id)->get()->toArray();

            return response()->json($servicesousservice);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceSousService $serviceSousService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceSousService $serviceSousService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceSousService $serviceSousService)
    {
        //
    }
}
