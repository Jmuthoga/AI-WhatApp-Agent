<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WebsiteScraper;
use App\Services\Chunker;
use App\Models\KbDocument;
use App\Models\KbChunk;

class IngestWebsite extends Command
{
    protected $signature = 'jmi:ingest-website';
    protected $description = 'Scrape JM Innovatech website and save chunks';

    public function handle()
    {
        $urls = [
            env('WEBSITE_HOME_URL'),
            env('WEBSITE_ABOUT_URL'),
            env('WEBSITE_SERVICES_URL'),
            env('WEBSITE_CONTACT_URL')
        ];

        $scraper = new WebsiteScraper();
        $chunker = new Chunker();

        foreach ($urls as $url) {
            $this->info("Fetching $url");
            $content = $scraper->fetchPage($url);
            if (!$content) continue;

            $doc = KbDocument::updateOrCreate(['url' => $url], ['content' => $content]);
            $chunks = $chunker->chunk($content, 2000);
            foreach ($chunks as $c) {
                KbChunk::create(['kb_document_id' => $doc->id, 'chunk_text' => $c]);
            }

            $this->info("Saved {$doc->url} with " . count($chunks) . " chunks");
        }

        $this->info("Website ingestion complete!");
    }
}
