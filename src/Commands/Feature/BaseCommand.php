<?php

declare(strict_types=1);

namespace Cross\Git\Commands\Feature;

use Cross\Attributes\Attributes;
use Cross\Attributes\AttributesInterface;
use Cross\Attributes\AttributesKeeper;
use Cross\Commands\ShellCommand;
use Cross\Statuses\Prepare;

abstract class BaseCommand extends ShellCommand
{
    /**
     * Branch.
     */
    protected ?string $branch = null;

    /**
     * Returns a branch name.
     */
    abstract protected function branch(): ?string;

    /**
     * @inheritDoc
     */
    protected function attributes(): AttributesInterface|AttributesKeeper
    {
        return Attributes::make()
            ->option('--project')->shortcut('-p')->none()->description("Define a project name");
    }

    /**
     * Is called before the handler call with a status.
     */
    protected function prepare(): Prepare
    {
        if ($this->branch = $this->branch()) {
            return Prepare::Continue;
        }

        return Prepare::Stop;
    }

    /**
     * Returns a project name.
     */
    protected function project(): ?string
    {
        if ($this->option('project')) {
            return $this->ask('Enter a project');
        }

        if ($project = $this->config('project')) {
            return $project;
        }

        return null;
    }
}
