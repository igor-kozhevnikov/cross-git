<?php

declare(strict_types=1);

namespace Cross\Git\Text\Extractors;

interface ExtractorInterface
{
    /**
     * Receives something from something end returns it.
     */
    public function extract(): ?string;
}
