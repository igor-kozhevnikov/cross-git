<?php

declare(strict_types=1);

namespace Cross\Git\Commands\Feature;

use Cross\Attributes\Attributes;
use Cross\Attributes\AttributesInterface;
use Cross\Attributes\AttributesKeeper;
use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;
use Cross\Git\Text\Handlers\Text\KebabCase;
use Cross\Git\Text\Handlers\Manager;
use Cross\Git\Text\Handlers\Text\OnlyWordCharacters;
use Cross\Git\Text\Handlers\Text\Trim;

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
        return "git checkout -b {$this->branch()}";
    }

    /**
     * Makes a branch name.
     */
    protected function branch(): string
    {
        if ($project = $this->getProject()) {
            $arguments[] = $project;
        }

        if ($number = $this->ask('Enter a task number')) {
            $arguments[] = $number;
        }

        if ($title = $this->getTaskTitle()) {
            $arguments[] = $title;
        }

        return implode('-', $arguments ?? []);
    }

    /**
     * Returns a project name.
     */
    private function getProject(): ?string
    {
        if ($this->option('project')) {
            return $this->ask('Enter a project');
        }

        if ($project = $this->config('project')) {
            return $project;
        }

        return null;
    }

    /**
     * Returns a task title.
     */
    private function getTaskTitle(): ?string
    {
        $title = $this->ask('Enter a task title');

        $manager = new Manager();
        $manager->add(OnlyWordCharacters::class);
        $manager->add(KebabCase::class);

        return $manager->handle($title);
    }
}
