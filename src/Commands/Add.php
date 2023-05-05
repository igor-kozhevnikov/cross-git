<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Commands\ShellCommand;
use Cross\Config\Config;

class Add extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected string $name = 'git:add';

    /**
     * @inheritDoc
     */
    protected string $description = 'Adds all files to index';

    /**
     * @inheritDoc
     */
    protected string|array $command = 'git add .';

    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $options = Config::get("$this->name.options");
        return "git add $options .";
    }
}
