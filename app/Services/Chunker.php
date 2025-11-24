<?php

namespace App\Services;

class Chunker
{
    public function chunk(string $text, int $maxChars = 2000): array
    {
        $text = trim($text);
        if ($text === '') return [];

        $chunks = [];
        $len = mb_strlen($text);
        $pos = 0;

        while ($pos < $len) {
            $part = mb_substr($text, $pos, $maxChars);
            $lastDot = mb_strrpos($part, '.');
            if ($lastDot !== false && $lastDot > 100) {
                $part = mb_substr($part, 0, $lastDot + 1);
            }
            $chunks[] = trim($part);
            $pos += mb_strlen($part);
        }

        return $chunks;
    }
}
