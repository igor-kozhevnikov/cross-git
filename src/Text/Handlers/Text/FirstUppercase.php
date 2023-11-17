<?php

declare(strict_types=1);

namespace Cross\Git\Text\Handlers\Text;

use Cross\Git\Text\Handlers\HandlerInterface;

class FirstUppercase implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(string $message): string
    {
        return ucfirst($message);
    }
}
