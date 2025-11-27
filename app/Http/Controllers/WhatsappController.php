<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAiService;
use App\Models\KbChunk;
use App\Models\Conversation;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class WhatsappController extends Controller
{
    // GET verification
    public function verify(Request $request)
    {
        $verifyToken = env('WHATSAPP_VERIFY_TOKEN');
        $mode = $request->query('hub.mode');
        $token = $request->query('hub.verify_token');
        $challenge = $request->query('hub.challenge');

        \Log::info("Webhook Verification Attempt", compact('mode','token','challenge'));

        if ($mode === 'subscribe' && $token === $verifyToken) {
            return response($challenge, 200)->header('Content-Type', 'text/plain');
        }

        return response('Invalid verification token', 403);
    }

    // POST webhook for incoming messages
    public function webhook(Request $request)
    {
        $message = $request->input('entry.0.changes.0.value.messages.0');
        if (!$message) return response('ok', 200);

        $from = $message['from'];
        $text = $message['text']['body'] ?? '';

        // Track conversation
        $conversation = Conversation::firstOrCreate(
            ['client_phone' => $from],
            ['last_message_at' => Carbon::now()]
        );

        $isNew = $conversation->isNewConversation();
        $conversation->last_message_at = Carbon::now();
        $conversation->save();

        // Fetch context
        $chunk = KbChunk::first();
        $context = $chunk->chunk_text ?? '';

        $system = "You are JM Innovatech AI Agent. Answer professionally and naturally. Use CONTEXT for website-related questions or JM Innovatech projects.";

        $userContent = ($isNew ? "This is JM Innovatech AI Agent Response: " : "")
            . "CONTEXT:\n{$context}\n\nQuestion: $text";

        $messages = [
            ['role' => 'system', 'content' => $system],
            ['role' => 'user', 'content' => $userContent]
        ];

        $ai = new OpenAiService();
        $resp = $ai->chat($messages);
        $reply = $resp['choices'][0]['message']['content'] ?? "Sorry, I couldn't find an answer.";

        // Send reply via WhatsApp
        Http::withToken(env('WHATSAPP_TOKEN'))->post(
            'https://graph.facebook.com/' . env('WHATSAPP_PHONE_ID') . '/messages',
            [
                'messaging_product' => 'whatsapp',
                'to' => $from,
                'type' => 'text',
                'text' => ['body' => $reply]
            ]
        );

        return response('ok', 200);
    }
}
