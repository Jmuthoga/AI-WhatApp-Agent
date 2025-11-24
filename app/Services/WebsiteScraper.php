<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Log;

class WebsiteScraper
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['timeout' => 15]);
    }

    public function fetchPage(string $url): string
    {
        try {
            $resp = $this->client->get($url);
            $html = (string)$resp->getBody();

            libxml_use_internal_errors(true);
            $crawler = new Crawler($html);
            libxml_clear_errors();

            $bodyNode = $crawler->filter('body');
            if ($bodyNode->count() === 0) {
                Log::error("No <body> tag found for $url");
                return '';
            }

            $text = $bodyNode->text();
            return trim(preg_replace('/\s+/', ' ', $text));
        } catch (\Exception $e) {
            Log::error("Scraper error for $url: " . $e->getMessage());
            return '';
        }
    }
}
