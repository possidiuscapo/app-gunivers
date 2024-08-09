<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSousService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'sous_service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function sousService()
    {
        return $this->belongsTo(SousService::class);
    }
}
