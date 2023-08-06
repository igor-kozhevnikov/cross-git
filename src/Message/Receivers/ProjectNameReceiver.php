<?php

declare(strict_types=1);

namespace Cross\Git\Message\Receivers;

use Cross\Git\Helpers\Git;

class ProjectNameReceiver implements ReceiverInterface
{
    /**
     * @inheritDoc
     */
    public function receive(): ?string
    {
        $branch = (new Git())->getCurrentBranch();

        preg_match('/^.+?(?=-)/su', $branch, $matches);

        if (! isset($matches[0])) {
            return null;
        }

        return mb_strtoupper($matches[0]);
    }
}
