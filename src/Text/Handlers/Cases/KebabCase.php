<?php

declare(strict_types=1);

namespace Cross\Git\Text\Handlers\Cases;

use Cross\Git\Text\Handlers\HandlerInterface;

class KebabCase implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(string $message): string
    {
        $words = explode(' ', $message);
        $words = array_map(static fn (string $word) => strtolower($word), $words);

        return implode('-', $words);
    }
}
