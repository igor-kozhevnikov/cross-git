<?php

declare(strict_types=1);

namespace Cross\Git\Text\Extractors\Jira;

use Cross\Git\Helpers\Git;
use Cross\Git\Text\Extractors\ExtractorInterface;

class ProjectFromBranch implements ExtractorInterface
{
    /**
     * @inheritDoc
     */
    public function extract(): ?string
    {
        $branch = (new Git())->getCurrentBranch();

        preg_match('/^.+?(?=-)/su', $branch, $matches);

        if (! isset($matches[0])) {
            return null;
        }

        return mb_strtoupper($matches[0]);
    }
}
