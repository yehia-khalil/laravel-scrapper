<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrapedArticle extends Model
{
    use HasFactory;

    protected $fillable = ['article_dom', 'title', 'description', 'published_at', 'link', 'website_id'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
