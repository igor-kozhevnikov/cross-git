<?php

declare(strict_types=1);

namespace Cross\Git\Message\Receivers;

interface ReceiverInterface
{
    /**
     * Receives something from something end returns it.
     */
    public function receive(): ?string;
}
