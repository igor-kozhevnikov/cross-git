<?php

declare(strict_types=1);

namespace Cross\Git\Text\Handlers\Jira;

use Cross\Git\Text\Extractors\ExtractorInterface;
use Cross\Git\Text\Handlers\HandlerInterface;
use RuntimeException;

class Issue implements HandlerInterface
{
    /**
     * Project name extractor.
     */
    protected ExtractorInterface $project;

    /**
     * Issue number extractor.
     */
    protected ExtractorInterface $issue;

    /**
     * Constructor.
     */
    public function __construct(ExtractorInterface|string $project, ExtractorInterface|string $issue)
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
        if (! $project = $this->project->extract()) {
            throw new RuntimeException('Project name is not received.');
        }

        if (! $issue = $this->issue->extract()) {
            throw new RuntimeException('Issue number is not received.');
        }

        return "$project-$issue: $message";
    }
}
