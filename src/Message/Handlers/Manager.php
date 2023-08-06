<?php

declare(strict_types=1);

namespace Cross\Git\Message\Handlers;

use InvalidArgumentException;

class Manager
{
    /**
     * List of handlers.
     *
     * @var array<int, class-string|HandlerInterface>|array<class-string|HandlerInterface, array<string, mixed>>
     */
    protected array $handlers = [];

    /**
     * Defines a list of handlers.
     *
     * @param array<int, class-string|HandlerInterface>|array<class-string|HandlerInterface, array<string, mixed>> $handlers
     */
    public function set(array $handlers): void
    {
        $this->reset();

        foreach ($handlers as $key => $value) {
            if (is_int($key)) {
                $this->add($value);
            } else {
                $this->add($key, $value);
            }
        }
    }

    /**
     * Adds a handler.
     */
    public function add(HandlerInterface|string $handler, array $args = []): void
    {
        if (is_string($handler)) {
            $handler = new $handler(...$args);
        }

        if (! ($handler instanceof HandlerInterface)) {
            throw new InvalidArgumentException('Handler does not implement the interface');
        }

        $this->handlers[] = $handler;
    }

    /**
     * Resets a list of handlers.
     */
    public function reset(): void
    {
        $this->handlers = [];
    }

    /**
     * Handles a message.
     */
    public function handle(string $message): string
    {
        foreach ($this->handlers as $handler) {
            $message = $handler->handle($message);
        }

        return $message;
    }
}
