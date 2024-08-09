<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public function newsletterhistoris()
    {
        return $this->belongsToMany(NewsletterHistory::class, 'newsletter_histories');
    }
}
