<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Commands\ShellCommand;
use Cross\Config\Config;
use Cross\Git\Git\Git;

class Push extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected string $name = 'git:push';

    /**
     * @inheritDoc
     */
    protected string $description = 'Push changes to the current branch';

    /**
     * @inheritDoc
     */
    protected function command(): string
    {
        $branch = (new Git())->getCurrentBranch();
        $options = Config::get("$this->name.options");
        return "git push $options origin $branch";
    }
}
