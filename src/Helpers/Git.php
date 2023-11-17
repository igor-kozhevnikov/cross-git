<?php

declare(strict_types=1);

namespace Cross\Git\Helpers;

use Symfony\Component\Process\Process;

class Git
{
    /**
     * Returns the current branch.
     */
    public function getCurrentBranch(): string
    {
        $process = Process::fromShellCommandline('git branch --show-current');

        if (0 !== $process->run()) {
            return '';
        }

        return trim($process->getOutput());
    }

    /**
     * Returns all branches by a prefix.
     *
     * @return string[]
     */
    public function getBranchesByPrefix(string $prefix): array
    {
        $process = Process::fromShellCommandline("git branch --list '$prefix*'");

        if (0 !== $process->run()) {
            return [];
        }

        $branches = explode(' ', $process->getOutput());
        $branches = array_map(static fn (string $item) => trim($item), $branches);
        $branches = array_filter($branches, static fn (string $item) => ! empty($item));

        return array_map(static fn (string $branch) => $branch, array_values($branches));
    }
}
