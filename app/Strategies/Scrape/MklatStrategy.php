<?php

namespace App\Strategies\Scrape;

use App\Models\ScrapedArticle;
use App\Models\Website;
use Goutte\Client;
use Illuminate\Support\Facades\Log;

class MklatStrategy implements ScrapeStrategy
{
    private $user_id;
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }
    public function scrape()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.mklat.com/category/technology/computer-internet/');
        $website = Website::whereLink('https://www.mklat.com/category/technology/computer-internet/')->first();
        $crawler->filter('li.post-item')->each(function ($item) use ($website) {
            $article_dom = $item->html();
            $title = $item->filter('h2.post-title')->text();
            $description = $item->filter('p.post-excerpt')->text();
            $published_at = now();
            $website_id = $website->id;
            ScrapedArticle::firstOrCreate(
                [
                    'title' => $title
                ],
                compact(['article_dom', 'title', 'description', 'published_at', 'website_id'])
            );
        });
        $website->last_scraped_by = $this->user_id;
        $website->last_scraped_at = now();
        $website->save();
    }
}
