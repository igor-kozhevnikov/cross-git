<?php

declare(strict_types=1);

namespace Cross\Git\Message\Receivers;

use Cross\Git\Helpers\Git;

class IssueNumberReceiver implements ReceiverInterface
{
    /**
     * @inheritDoc
     */
    public function receive(): ?string
    {
        $branch = (new Git())->getCurrentBranch();

        preg_match('/(?<=-)\d+(?=-)/u', $branch, $matches);

        return $matches[0] ?? null;
    }
}
