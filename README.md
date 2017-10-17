# WeFact API 2.3 for Laravel 5

[![Build Status](https://travis-ci.org/hyperized/wefact.svg?branch=master)](https://travis-ci.org/hyperized/wefact)

Official documentation:
-----------------------

* [WeFact API 2.3](https://www.wefact.nl/wefact-hosting/apiv2/)
* [Official API examples](https://www.wefact.nl/wefact-hosting/apiv2/)

Installation
------------

Install using composer:
```bash
composer require hyperized/wefact
```

This package supports Package Auto-Discovery (Laravel 5.5+) so it doesn't require you to manually add the ServiceProvider and alias.

If you are using a lower version of Laravel or not using Auto-Discovery you can add the WeFact Service Provider to the `config/app.php` file 

```php
Hyperized\Wefact\WefactServiceProvider::class,
```
Register a alias for Wefact, also in `config/app.php`:

```php
'Wefact'    => Hyperized\Wefact\WefactServiceProvider::class,
```
Now publish the Wefact package into your installation:
```bash
php artisan vendor:publish --provider="Hyperized\Wefact\WefactServiceProvider" --tag="config"
```
This should give you a message like: `Copied File [/vendor/hyperized/wefact/src/config/Wefact.php] To [/config/Wefact.php]`

It's possible to edit your configuration variables in the `config/Wefact.php` file or you can use the `WEFACT_URL` and `WEFACT_KEY` environment variables to store sensitive information in the `.env` file 
```php
// config/Wefact.php
'api_v2_url'		=> env('WEFACT_URL', 'https://yoursite.tld/Pro/apiv2/api.php'),
'api_v2_key'		=> env('WEFACT_KEY', 'token'),
'api_v2_timeout'	=> 10,

// .env/.env.example
WEFACT_URL=https://yoursite.tld/Pro/apiv2/api.php
WEFACT_KEY=token
```

Example code:
```php
// Direct use
$product = new Hyperized\Wefact\Types\Product();
$productParams = [
    'searchfor' => 'invoice'
];
$output = $product->list($productParams);

// Use in Controllers
use Hyperized\Wefact\Types\Product;

class MyController extends Controller {
    public function getProducts()
    {
        $product = new Product();
        $productParams = [
            'searchfor' => 'invoice'
        ];
        return $product->list($productParams);
    }
}
```


