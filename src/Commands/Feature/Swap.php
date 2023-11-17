<?php

declare(strict_types=1);

namespace Cross\Git\Commands\Feature;

use Cross\Commands\Attributes\Aliases;
use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Git\Helpers\Git;

#[Name('git:feature:swap')]
#[Description('Switch between feature branches')]
#[Aliases('git:feature:switch')]
class Swap extends BaseCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        return "git switch $this->branch";
    }

    /**
     * @inheritDoc
     */
    protected function branch(): ?string
    {
        $prefix = $this->prefix();
        $branches = (new Git())->getBranchesByPrefix($prefix);

        if (count($branches) > 1) {
            return $this->choice('Select a branch', $branches);
        }

        if (count($branches) === 1) {
            return $branches[0];
        }

        $this->error("Not found a branch with prefix: '$prefix'.");

        return null;
    }

    /**
     * Returns a branch prefix.
     */
    private function prefix(): string
    {
        $prefix = '';

        if ($project = $this->project()) {
            $prefix = $project;
        }

        return "$prefix-{$this->number()}";
    }

    /**
     * Returns a task number.
     */
    private function number(): string
    {
        return $this->ask('Enter a task number');
    }
}
