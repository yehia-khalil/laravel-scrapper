<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WebsiteObserver
{
    /**
     * Handle the Website "created" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function created(Website $website)
    {
    }

    /**
     * Handle the Website "updated" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function updated(Website $website)
    {
        History::create(['user_id' => $website->last_scraped_by, 'website_id' => $website->id]);
    }

    /**
     * Handle the Website "deleted" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function deleted(Website $website)
    {
        //
    }

    /**
     * Handle the Website "restored" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function restored(Website $website)
    {
        //
    }

    /**
     * Handle the Website "force deleted" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function forceDeleted(Website $website)
    {
        //
    }
}
