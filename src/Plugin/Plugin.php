<?php

declare(strict_types=1);

namespace Cross\Git\Plugin;

use Cross\Plugin\BasePlugin;

class Plugin extends BasePlugin
{
    /**
     * @inheritdoc
     */
    public string $key = 'git';

    /**
     * @inheritDoc
     */
    public function getConfig(): array
    {
        return require __DIR__ . '/../../config/config.php';
    }

    /**
     * @inheritDoc
     */
    public function getCommands(): array
    {
        return require __DIR__ . '/../../config/commands.php';
    }
}
