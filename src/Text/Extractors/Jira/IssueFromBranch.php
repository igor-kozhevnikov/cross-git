<?php

declare(strict_types=1);

namespace Cross\Git\Text\Extractors\Jira;

use Cross\Git\Helpers\Git;
use Cross\Git\Text\Extractors\ExtractorInterface;

class IssueFromBranch implements ExtractorInterface
{
    /**
     * @inheritDoc
     */
    public function extract(): ?string
    {
        $branch = (new Git())->getCurrentBranch();

        preg_match('/(?<=-)\d+(?=-)/u', $branch, $matches);

        return $matches[0] ?? null;
    }
}
