<?php

declare(strict_types=1);

namespace Cross\Git\Commands\Feature;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Git\Text\Handlers\Text\KebabCase;
use Cross\Git\Text\Handlers\Manager;
use Cross\Git\Text\Handlers\Text\OnlyWordCharacters;

#[Name('git:feature:create')]
#[Description('Creates a feature branch')]
class Create extends BaseCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        return "git switch -c $this->branch";
    }

    /**
     * @inheritDoc
     */
    protected function branch(): string
    {
        if ($project = $this->project()) {
            $arguments[] = $project;
        }

        if ($number = $this->ask('Enter a task number')) {
            $arguments[] = $number;
        }

        if ($title = $this->title()) {
            $arguments[] = $title;
        }

        return implode('-', $arguments ?? []);
    }

    /**
     * Returns a task title.
     */
    private function title(): ?string
    {
        $title = $this->ask('Enter a task title');

        $handlers = $this->config('title.handlers', [
            // OnlyWordCharacters::class,
            // KebabCase::class,
        ]);

        $manager = new Manager();
        $manager->set($handlers);

        return $manager->handle($title);
    }
}
