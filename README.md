# Extracted from https://blade-ui-kit.com/blade-icons

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
    'route_prefix' => '/blade-icons'
];
```

## Usage

https://github.com/blade-ui-kit/blade-ui-kit.com#readme

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
