<?php

declare(strict_types=1);

namespace Cross\Git\Message\Handlers;

use Cross\Git\Message\Receivers\ReceiverInterface;
use RuntimeException;

class ProjectIssueHandler implements HandlerInterface
{
    /**
     * Project name receiver.
     */
    protected ReceiverInterface $project;

    /**
     * Issue number receiver.
     */
    protected ReceiverInterface $issue;

    /**
     * Constructor.
     */
    public function __construct(ReceiverInterface|string $project, ReceiverInterface|string $issue)
    {
        $this->project = is_string($project) ? new $project() : $project;
        $this->issue = is_string($issue) ? new $issue() : $issue;
    }

    /**
     * @inheritDoc
     * @throws RuntimeException
     */
    public function handle(string $message): string
    {
        if (! $project = $this->project->receive()) {
            throw new RuntimeException('Project name is not received.');
        }

        if (! $issue = $this->issue->receive()) {
            throw new RuntimeException('Issue number is not received.');
        }

        return "$project-$issue: $message";
    }
}
