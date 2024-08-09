<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterUnsubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'newsletter_subscriber_id'
    ];


    public function newsletterSubscriber()
    {
        return $this->belongsTo(NewsletterSubscriber::class);
    }
}
