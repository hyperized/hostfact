# WeFact API 2.3 for Laravel 5

Official documentation:
* [WeFact API 2.3](https://www.wefact.nl/wefact-hosting/apiv2/)
* [Official API examples](https://www.wefact.nl/wefact-hosting/apiv2/)

Installation with composer:

Add the following to the "require" section of your composer.json:
```json
"hyperized/wefact": "~2.3"
```
Run:
```sh
composer update
```

Add to config/app.php in the 'providers' array:
```php
'Hyperized\Wefact\WefactServiceProvider',
```
In the 'aliases' array for ease of use:

```php
'Wefact'    => 'Hyperized\Wefact\WefactFacade',
```
Then, via the CLI:
```sh
php artisan vendor:publish
```

Edit your configuration variables in Wefact.php, newly installed in your /config directory.
```php
'api_v2_url'		=> 'https://yoursite.tld/Pro/apiv2/api.php',
'api_v2_key'		=> 'token',
'api_v2_timeout'	=> 10,
```

Example code:
```php
// Direct use
  $product = new Hyperized\Wefact\Product();
  $productParams = [
    'searchfor' => 'invoice'
  ];
  $output = $product->list($productParams);

// Use in Controllers
use Hyperized\Wefact;

class MyController extends Controller {
  public function getProducts()
  {
    $product = new Wefact\Product();
    $productParams = [
      'searchfor' => 'invoice'
    ];
    return $product->list($productParams);
  }
```

