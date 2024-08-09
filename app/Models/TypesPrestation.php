<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesPrestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'prestation_id',
    ];

    public function prestation()
    {
        return $this->belongsTo(Prestation::class);
    }
}
