<?php

namespace App\Strategies\Scrape;

use App\Models\ScrapedArticle;
use App\Models\Website;
use Goutte\Client;

class ArabMediaSocietyStrategy implements ScrapeStrategy
{
    private $user_id;
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function scrape()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.arabmediasociety.com/category/features/');
        $website = Website::whereLink('https://www.arabmediasociety.com/category/features/')->first();
        $crawler->filter('article.item-list')->each(function ($item) use ($website) {
            $article_dom = $item->html();
            $title = $item->filter('h2.post-box-title')->text();
            $description = $item->filter('div.entry > p')->text();
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
