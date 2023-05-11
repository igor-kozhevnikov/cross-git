<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;

#[Name('git:add')]
#[Description('Adds all files to index')]
class Add extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $options = $this->config('options');
        return "git add $options .";
    }
}
