<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'types_prestations_id',
        'image',
    ];

    public function types_prestations()
    {
        return $this->belongsTo(TypesPrestation::class);
    }
}
