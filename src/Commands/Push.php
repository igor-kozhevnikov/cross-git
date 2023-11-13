<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;
use Cross\Git\Helpers\Git;

#[Name('git:push')]
#[Description('Pushes changes to the current branch')]
class Push extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $branch = (new Git())->getCurrentBranch();
        $options = $this->config('options');
        return "git push $options origin $branch";
    }
}
