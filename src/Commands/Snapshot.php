<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Attributes\AttributesKeeper;
use Cross\Commands\SequenceCommand;
use Cross\Attributes\Attributes;
use Cross\Attributes\AttributesInterface;
use Cross\Config\Config;
use Cross\Sequence\Sequence;
use Cross\Sequence\SequenceInterface;
use Cross\Sequence\SequenceKeeper;

class Snapshot extends SequenceCommand
{
    /**
     * @inheritDoc
     */
    protected string $name = 'git:snapshot';

    /**
     * @inheritDoc
     */
    protected array $aliases = ['snap'];

    /**
     * @inheritDoc
     */
    protected string $description = 'Add, commit and push';

    /**
     * @inheritDoc
     */
    protected function attributes(): AttributesInterface|AttributesKeeper
    {
        return Attributes::make()
            ->option('--add')->shortcut('-a')->none()->description("Don't add all files to index")
            ->option('--commit')->shortcut('-c')->none()->description("Don't commit changes")
            ->option('--push')->shortcut('-p')->none()->description("Don't push changes");
    }

    /**
     * @inheritDoc
     */
    protected function sequence(): SequenceInterface|SequenceKeeper
    {
        $add = $this->option('add') || ! Config::get("$this->name.is_use_add");
        $commit = $this->option('commit') || ! Config::get("$this->name.is_use_commit");
        $push = $this->option('push') || ! Config::get("$this->name.is_use_push");

        return Sequence::make()
            ->item(Add::class)->whenNot($add)
            ->item(Commit::class)->whenNot($commit)
            ->item(Push::class)->whenNot($push);
    }
}
