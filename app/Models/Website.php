<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'last_scrapted_at', 'scraped_by'];
    public $timestamps = true;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($website) {
    //         $website->last_scrapted_at = \Carbon::now();
    //         $website->scraped_by = Auth::id();
    //     });
    // }
}
