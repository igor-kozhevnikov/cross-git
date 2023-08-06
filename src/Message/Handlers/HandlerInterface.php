<?php

declare(strict_types=1);

namespace Cross\Git\Message\Handlers;

interface HandlerInterface
{
    /**
     * Handles a message.
     */
    public function handle(string $message): string;
}
