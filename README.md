# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jakerw/vcrud-generator.svg?style=flat-square)](https://packagist.org/packages/jakerw/vcrud-generator)
[![Build Status](https://img.shields.io/travis/jakerw/vcrud-generator/master.svg?style=flat-square)](https://travis-ci.org/jakerw/vcrud-generator)
[![Quality Score](https://img.shields.io/scrutinizer/g/jakerw/vcrud-generator.svg?style=flat-square)](https://scrutinizer-ci.com/g/jakerw/vcrud-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/jakerw/vcrud-generator.svg?style=flat-square)](https://packagist.org/packages/jakerw/vcrud-generator)

The package is a Utility tool briging together a number of Laravels console commands such as make:model nake:controller and adding view creation so save the manual leg work.

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
- Backend Requests 
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

