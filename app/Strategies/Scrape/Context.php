<?php

namespace App\Strategies\Scrape;

class Context
{
    private $strategy;

    public function __construct()
    {
    }

    public function setStrategy(ScrapeStrategy $scrapeStrategy)
    {
        $this->strategy = $scrapeStrategy;
    }

    public function execute()
    {
        $this->strategy->scrape();
    }
}
