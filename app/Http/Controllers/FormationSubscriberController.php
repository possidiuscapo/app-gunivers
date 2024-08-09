<?php

namespace App\Http\Controllers;

use App\Models\FormationSubscriber;
use Exception;
use Illuminate\Http\Request;

class FormationSubscriberController extends Controller
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
        // dd($request->all());
        // echo 'je suis le store le resource';
        // echo $request->json()->all();
        // var_dump($request->json()->all());
        // exit;
        try {
            $request->validate([
                'lastName' => 'required|string|max:255',
                'firstName' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:formation_subscribers',
                'profession' => 'nullable|string|max:255',
                'residence' => 'nullable|string|max:255',
                'phoneNumber' => 'nullable|string|max:255',
                'educationLevel' => 'nullable|string|max:255',
                'lastInstitution' => 'nullable|string|max:255',
                'professionalSkills' => 'nullable|string',
                'motivation' => 'nullable|string',
                'emergencyContactName' => 'nullable|string|max:255',
                'emergencyContactPhone' => 'nullable|string|max:255',
                'emergencyContactRelationship' => 'nullable|string|max:255',
                'emergencyContactAddress' => 'nullable|string|max:255',
                'socialDisability' => 'nullable|string',
                'maritalStatus' => 'nullable|string|max:255',
                'numberOfChildren' => 'nullable|integer',
                'hasChildren' => 'nullable|boolean',
                'referralSource' => 'nullable|string|max:255',
                'futurePlans' => 'nullable|string',
                'formationId' => 'required|integer|exists:formations,id',
                // 'agent_id' => 'nullable|integer|exists:agents,id',
                'countryId' => 'required|integer|exists:pays,id',
                // 'to_subscribe' => 'nullable|boolean',
            ]);

            $formationSubscriber = FormationSubscriber::create([
                'lastname' => $request->lastName,
                'firstname' => $request->firstName,
                'email' => $request->email,
                'profession' => $request->profession,
                'residence' => $request->residence,
                'phone_number' => $request->phoneNumber,
                'education_level' => $request->educationLevel,
                'last_institution' => $request->lastInstitution,
                'professional_skills' => $request->professionalSkills,
                'motivation' => $request->motivation,
                'emergency_contact_name' => $request->emergencyContactName,
                'emergency_contact_phone' => $request->emergencyContactPhone,
                'emergency_contact_relationship' => $request->emergencyContactRelationship,
                'emergency_contact_address' => $request->emergencyContactAddress,
                'social_disability' => $request->socialDisability,
                'marital_status' => $request->maritalStatus,
                'number_of_children' => $request->numberOfChildren,
                'has_children' => $request->hasChildren,
                'referral_source' => $request->referralSource,
                'future_plans' => $request->futurePlans,
                'formation_id' => $request->formationId,
                // 'agent_id' => $request->agent_id,
                'pays_id' => $request->countryId,
                'to_subscribe' => true,
            ]);

            $formationSubscriber = FormationSubscriber::create($request->all());


            return response()->json([
                'success' => 'Enregistrer avec succès'
            ]);

        } catch (Exception $e) {
            // dd($e);
            echo $e->getMessage();
            return response()->json([
                'error' => 'Erreur lors de l\'enregistrement '. $e->getMessage() .''
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FormationSubscriber $formationSubscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormationSubscriber $formationSubscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormationSubscriber $formationSubscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormationSubscriber $formationSubscriber)
    {
        //
    }
}
