<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationSubscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'profession',
        'residence',
        'phone_number',
        'education_level',
        'last_institution',
        'professional_skills',
        'motivation',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'emergency_contact_address',
        'social_disability',
        'marital_status',
        'number_of_children',
        'has_children',
        'referral_source',
        'future_plans',
        'formation_id',
        'agent_id',
        'pays_id',
        'to_subscribe'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }
}
