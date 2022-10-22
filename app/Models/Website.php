<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'last_scrapted_at', 'last_scraped_by'];
    public $timestamps = true;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($website) {
    //         $website->last_scrapted_at = \Carbon::now();
    //         $website->last_scraped_by = Auth::id();
    //     });
    // }

    public function scrapedBy()
    {
        return $this->belongsTo(User::class, 'last_scraped_by', 'id');
    }
    public function articles()
    {
        return $this->hasMany(ScrapedArticle::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
