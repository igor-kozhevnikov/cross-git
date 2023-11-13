<?php

declare(strict_types=1);

namespace Cross\Git\Commands\Feature;

use Cross\Attributes\Attributes;
use Cross\Attributes\AttributesInterface;
use Cross\Attributes\AttributesKeeper;
use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;
use Cross\Git\Text\Handlers\Cases\KebabCase;

#[Name('git:feature:create')]
#[Description('Creates a feature branch')]
class Create extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected function attributes(): AttributesInterface|AttributesKeeper
    {
        return Attributes::make()
            ->option('--project')->shortcut('-p')->none()->description("Define a project");
    }

    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        return "git branch {$this->name()}";
    }

    /**
     * Makes a branch name.
     */
    protected function name(): string
    {
        if ($this->option('project')) {
            $arguments[] = $this->ask('Enter a project');
        } elseif ($project = $this->config('project')) {
            $arguments[] = $project;
        }

        if ($number = $this->ask('Enter a task number')) {
            $arguments[] = $number;
        }

        if ($title = $this->ask('Enter a task title')) {
            $arguments[] = (new KebabCase())->handle($title);
        }

        return implode('-', $arguments ?? []);
    }
}
