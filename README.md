# Cross for Git

[![PHP](https://img.shields.io/badge/php-8.1-green.svg?style=flat-square)](https://github.com/igor-kozhevnikov/cross-git)
[![License](https://img.shields.io/github/license/igor-kozhevnikov/cross-git?style=flat-square)](https://github.com/igor-kozhevnikov/cross-git)
[![Release](https://img.shields.io/github/v/release/igor-kozhevnikov/cross-git?style=flat-square)](https://github.com/igor-kozhevnikov/cross-git)

Set of console commands for git.

## Install

This package depends on [Cross](https://github.com/igor-kozhevnikov/cross) package.

```shell
composer require igor-kozhevnikov/cross-git
```

## Configuration

If your project doesn't have a `cross.php` config file in the root directory, just run the follow command.

```shell
./vendor/bin/cross cross:config
```

Add data as described below to the `cross.php` file.

```php
<?php

return [
    'plugins' => [
        \Cross\Git\Plugin\Plugin::class,
    ],
];
```

To learn more about the available configurations, see the [plugin](https://github.com/igor-kozhevnikov/cross-git/blob/1.x/config/config.php) and [commands](https://github.com/igor-kozhevnikov/cross-git/blob/1.x/config/commands.php) config files.

## Commands

### Adds all files to index

```shell
./vendor/bin/cross git:add
```

Config:

- `options` Applied options

### Commit changes with a message

```shell
./vendor/bin/cross git:commit
```

Config:

- `options` Applied options
- `message.handlers` Handlers for a message

### Push changes to the current branch

```shell
./vendor/bin/cross git:push
```

Config:

- `options` Applied options

### Add, commit and push

```shell
./vendor/bin/cross git:snapshot [options]
```

```shell
./vendor/bin/cross snap [options]
```

Options:

- `-a` `--add` Don't add all files to index
- `-c` `--commit` Don't commit changes
- `-p` `--push` Don't push changes

Config:

- `is_use_add` If the value is positive then the `add` command will be used
- `is_use_commit` If the value is positive then the `commit` command will be used
- `is_use_push` If the value is positive then the `push` command will be used

### Create a feature branch

```shell
./vendor/bin/cross git:feature:create
```

Options:

- `-p` `--project` Define a project name

Config:

- `project` Project name
- `title.handlers` Handlers for a title

### Switch between feature branches

```shell
./vendor/bin/cross git:feature:switch
```

Options:

- `-p` `--project` Define a project name

## License

The Cross for Git is open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).
