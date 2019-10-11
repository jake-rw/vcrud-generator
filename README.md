# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jakerw/vcrud-generator.svg?style=flat-square)](https://packagist.org/packages/jakerw/vcrud-generator)
[![Build Status](https://img.shields.io/travis/jakerw/vcrud-generator/master.svg?style=flat-square)](https://travis-ci.org/jakerw/vcrud-generator)
[![Quality Score](https://img.shields.io/scrutinizer/g/jakerw/vcrud-generator.svg?style=flat-square)](https://scrutinizer-ci.com/g/jakerw/vcrud-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/jakerw/vcrud-generator.svg?style=flat-square)](https://packagist.org/packages/jakerw/vcrud-generator)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require jakerw/vcrud-generator
```

## Usage

Running the below will work all sorts of magic. In the background it will be creating the following:
- Model
- Migration 
- Backend Controller 
- Backend views based on AdminLTE

You simply need to pass the Model name as an argument.

``` php
php artisan make:vrud Phone
```

## Credits

- [Jake Rudkin-Wilson](https://github.com/jake-rw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

