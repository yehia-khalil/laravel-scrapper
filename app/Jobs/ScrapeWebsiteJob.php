<?php

namespace App\Jobs;

use App\Models\Website;
use App\Strategies\Scrape\ArabMediaSocietyStrategy;
use App\Strategies\Scrape\Context;
use App\Strategies\Scrape\MklatStrategy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ScrapeWebsiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $user_id;
    private $website;
    private $scrapeContext;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Website $website, $user_id)
    {
        $this->website = $website;
        $this->user_id = $user_id;
        $this->scrapeContext = new Context();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (Str::contains($this->website->link, 'mklat')) {
            $this->scrapeContext->setStrategy(new MklatStrategy($this->user_id));
        } else {
            if (Str::contains($this->website->link, 'arabmediasociety')) {
                $this->scrapeContext->setStrategy(new ArabMediaSocietyStrategy($this->user_id));
            }
        }
        $this->scrapeContext->execute();
    }
}
