<?php

declare(strict_types=1);

namespace Cross\Git\Text\Handlers\Text;

use Cross\Git\Text\Handlers\HandlerInterface;

class OnlyWordCharacters implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(string $message): string
    {
        return preg_replace('/[^\w\s\-_]/', '', $message);
    }
}
