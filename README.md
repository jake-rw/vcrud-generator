# VCrud Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jake-rw/vcrud-generator.svg?style=flat-square)](https://packagist.org/packages/jake-rw/vcrud-generator)
[![Build Status](https://img.shields.io/travis/jake-rw/vcrud-generator/master.svg?style=flat-square)](https://travis-ci.org/jake-rw/vcrud-generator)
[![Quality Score](https://img.shields.io/scrutinizer/g/jake-rw/vcrud-generator.svg?style=flat-square)](https://scrutinizer-ci.com/g/jake-rw/vcrud-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/jake-rw/vcrud-generator.svg?style=flat-square)](https://packagist.org/packages/jake-rw/vcrud-generator)

The package is a Utility tool briging together a number of Laravels console commands to so save the manual leg work such as:

* make:model 
* make:controller 
* make:tests
* and adding view creation 

## Installation

You can install the package via composer:

```bash
composer require jake-rw/vcrud-generator
```

## Usage

Running the below will work all sorts of magic. In the background it will be creating the following by simply passing in a Model name as an argument:

- Model
- Migration 
- Backend Controller
- Backend Requests 
- Backend views based on AdminLTE
- Tests


``` php
php artisan make:vrud Phone
```

## Credits

- [Jake Rudkin-Wilson](https://github.com/jake-rw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

