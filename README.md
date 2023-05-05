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
        \Cross\Git\Plugin\Plugin::class => [
            //
        ],
    ],
    'commands' => [
        //
    ],
];
```

To learn more about the available configurations, see the [plugin](https://github.com/igor-kozhevnikov/cross-git/blob/1.x/config/config.php) and [commands](https://github.com/igor-kozhevnikov/cross-git/blob/1.x/config/commands.php) config files.

## Commands
 
...

## License

The Cross for Git is open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).
