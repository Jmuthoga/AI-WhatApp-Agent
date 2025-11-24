<?php

namespace App\Services;

use OpenAI;

class OpenAiService
{
    protected $client;
    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function chat(array $messages, $model = 'gpt-4o-mini', $max_tokens = 500)
    {
        return $this->client->chat()->create([
            'model' => $model,
            'messages' => $messages,
            'max_tokens' => $max_tokens,
        ]);
    }
}
