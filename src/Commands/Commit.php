<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;

#[Name('git:commit')]
#[Description('Commit changes with a message')]
class Commit extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $massage = $this->ask('Enter a message');
        $options = $this->config('options');
        return "git commit $options -m \"$massage\"";
    }
}
