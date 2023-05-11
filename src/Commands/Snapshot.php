<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Attributes\AttributesKeeper;
use Cross\Commands\Attributes\Aliases;
use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\SequenceCommand;
use Cross\Attributes\Attributes;
use Cross\Attributes\AttributesInterface;
use Cross\Sequence\Sequence;
use Cross\Sequence\SequenceInterface;
use Cross\Sequence\SequenceKeeper;

#[Name('git:snapshot')]
#[Description('Add, commit and push')]
#[Aliases('snap')]
class Snapshot extends SequenceCommand
{
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
        $add = $this->option('add') || ! $this->config('is_use_add');
        $commit = $this->option('commit') || ! $this->config('is_use_commit');
        $push = $this->option('push') || ! $this->config('is_use_push');

        return Sequence::make()
            ->item(Add::class)->whenNot($add)
            ->item(Commit::class)->whenNot($commit)
            ->item(Push::class)->whenNot($push);
    }
}
