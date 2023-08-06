<?php

declare(strict_types=1);

namespace Cross\Git\Commands;

use Cross\Commands\Attributes\Description;
use Cross\Commands\Attributes\Name;
use Cross\Commands\ShellCommand;
use Cross\Git\Message\Handlers\Manager;
use Exception;

#[Name('git:commit')]
#[Description('Commit changes with a message')]
class Commit extends ShellCommand
{
    /**
     * @inheritDoc
     */
    protected function command(): string|array
    {
        $massage = $this->message();
        $options = $this->config('options');

        dd("git commit $options -m \"$massage\"");

        return "";
//        return "git commit $options -m \"$massage\"";
    }

    protected function message(): string
    {
        $message = $this->ask('Enter a message');
        $handlers = $this->config('message.handlers');

        if (! is_array($handlers) || ! $handlers) {
            return $message;
        }

        $manager = new Manager();
        $manager->set($handlers);

        try {
            return $manager->handle($message);
        } catch (Exception $exception) {
            $this->error($exception->getMessage());
        }

        return '';
    }
}
