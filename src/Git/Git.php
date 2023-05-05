<?php

declare(strict_types=1);

namespace Cross\Git\Git;

use Symfony\Component\Process\Process;

class Git
{
    /**
     * Returns the current branch.
     */
    public function getCurrentBranch(): string
    {
        $process = Process::fromShellCommandline('git branch --show-current');

        if (0 != $process->run()) {
            return '';
        }

        return trim($process->getOutput());
    }
}
