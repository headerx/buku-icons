# Installs over 50,000 icons. From https://blade-ui-kit.com/blade-icons

[![Latest Version on Packagist](https://img.shields.io/packagist/v/headerx/buku-icons.svg?style=flat-square)](https://packagist.org/packages/headerx/buku-icons)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/headerx/buku-icons/run-tests?label=tests)](https://github.com/headerx/buku-icons/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/headerx/buku-icons/Check%20&%20fix%20styling?label=code%20style)](https://github.com/headerx/buku-icons/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/headerx/buku-icons.svg?style=flat-square)](https://packagist.org/packages/headerx/buku-icons)

## Installation

You can install the package via composer:

```bash
composer require headerx/buku-icons
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="HeaderX\BukuIcons\BukuIconsServiceProvider" --tag="buku-icons-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="HeaderX\BukuIcons\BukuIconsServiceProvider" --tag="buku-icons-config"
```

This is the contents of the published config file:

```php
<?php

return [
    'route_prefix' => '/blade-icons',

    'middleware' => [
        'web',
    ],

    'db_connection' => env('DB_CONNECTION', 'mysql'),
];
```

## Usage

Publish migrate and import in one step
```bash
php artisan buku-icons:install
```

Or publish configuration and migrations and migrate manually, then run
```bash
php artisan buku-icons:import
```

run `artisan serve` then visit http://localhost:8000/blade-icons and see over 50,000 icons searchable with livewire!

See https://github.com/blade-ui-kit/blade-ui-kit.com for more info. 

All I've done is make a package from the icon portion of Blade UI Kit website,
which incidentally can be used to set up icon relationships in your Eloquent models.

If you like this package and want to make a donation, please visit https://github.com/sponsors/driesvints.

I personally am not accepting donations at this time, thank you.

P.S I am currently accepting PR's for the folowing:

> I would like to bring back in support for meilisearch with scout, 
> but had to disable it for now to allow a standard search scope.
> What I would like is to have a singleton with a repository layer
> to allow configuring the use of custom Icon models. 


> Instead for now I've just allowed for confuration of the connection in case 
> you just want to use this for an ad hoc script for loading all the icons into 
> an Sqlite database or something of that nature. 

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [inmanturbo](https://github.com/inmanturbo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
