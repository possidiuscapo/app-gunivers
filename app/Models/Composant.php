<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'unity'
    ];

    public function packs()
    {
        return $this->belongsToMany(Pack::class, 'pack_composants');
    }

}
