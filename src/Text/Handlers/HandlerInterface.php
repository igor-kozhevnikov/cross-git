<?php

declare(strict_types=1);

namespace Cross\Git\Text\Handlers;

interface HandlerInterface
{
    /**
     * Handles a message.
     */
    public function handle(string $message): string;
}
