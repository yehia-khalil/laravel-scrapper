<?php

namespace App\Strategies\Scrape;

class ArabMediaSocietyStrategy implements ScrapeStrategy
{
    private $user_id;
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }
    public function scrape()
    {
        return true;
    }
}
