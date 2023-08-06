<?php

declare(strict_types=1);

namespace Cross\Git\Message\Handlers;

class FirstUppercaseHandler implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(string $message): string
    {
        return ucfirst($message);
    }
}
