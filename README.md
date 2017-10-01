Boolean form type
=================

[![Build Status](https://travis-ci.org/fsevestre/BooleanFormType.svg?branch=master)](https://travis-ci.org/fsevestre/BooleanFormType)


Boolean form type for Symfony REST APIs.


Installation
------------
The recommended way to install this library is through [Composer](http://getcomposer.org/).

Require the `fsevestre/boolean-form-type` package by running the following command:

```sh
$ composer require fsevestre/boolean-form-type
```

This will resolve the latest stable version and install all the dependencies.

Otherwise, install the library and setup the autoloader yourself.


Usage
-----

```php
$builder->add('enabled', BooleanType::class);
```

The form type use a data transformer which will transform the value to `true` (`1`, `'1'`, `true` or `'true'`)
or `false` (`0`, `'0'`, `false` or `'false'`).

> **Note:** The form type is not intended to be displayed on a browser: use the built-in `CheckboxType` form type
> provided by Symfony instead.


Tests
-----

To setup and run tests follow these steps:
```sh
$ composer install
$ bin/phpunit
```


Contributing
------------
See [CONTRIBUTING](CONTRIBUTING.md) file.


License
-------
This library is distributed under the [MIT license](LICENSE).
