<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Commands\ShellCommand;
use Cross\Config\Config;

class Commit extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected string $name = 'git:commit';

    /**
     * @inheritDoc
     */
    protected string $description = 'Commit changes with a message';

    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $massage = $this->ask('Enter a message');
        $options = Config::get("$this->name.options");
        return "git commit $options -m \"$massage\"";
    }
}
