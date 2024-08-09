<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'newsletter_subscriber_id',
        'newsletter_id',
    ];

    public function newsletterSubscriber()
    {
        return $this->belongsTo(NewsletterSubscriber::class);
    }

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }
}
