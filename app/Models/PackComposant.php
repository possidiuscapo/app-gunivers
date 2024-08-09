<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackComposant extends Model
{
    use HasFactory;

    protected $fillable = [
        'pack_id',
        'composant_id',
    ];

    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }

    public function composant()
    {
        return $this->belongsTo(Composant::class);
    }
}

