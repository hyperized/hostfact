# WeFact API 2.3 for Laravel 5

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

Register the Wefact ServiceProvider, open `config/app.php`:
```php
Hyperized\Wefact\WefactServiceProvider::class,
```
Register a alias for Wefact, also in `config/app.php`:

```php
'Wefact'    => Hyperized\Wefact\WefactServiceProvider::class,
```
Now publish the Wefact package into your installation:
```bash
php artisan vendor:publish
```
This should give you a message like: `Copied File [/vendor/hyperized/wefact/src/config/Wefact.php] To [/config/Wefact.php]`

Now edit your configuration variables in the newly installed `config/Wefact.php`
```php
'api_v2_url'		=> 'https://yoursite.tld/Pro/apiv2/api.php',
'api_v2_key'		=> 'token',
'api_v2_timeout'	=> 10,
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
```


