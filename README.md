# Hostfact API v3.1 for Laravel

[![Run tests](https://github.com/hyperized/hostfact/actions/workflows/main.yml/badge.svg)](https://github.com/hyperized/hostfact/actions/workflows/main.yml)

Unofficial Laravel package for the [HostFact API v2](https://www.hostfact.nl/developer/api/).

## Requirements

- PHP 8.4+
- Laravel 13 and above (auto-discovery supported)

## Installation

```bash
composer require hyperized/hostfact
```

Publish the configuration:

```bash
php artisan vendor:publish --provider="Hyperized\Hostfact\Providers\HostfactServiceProvider" --tag="config"
```

## Configuration

Add these to your `.env` file:

```env
HOSTFACT_URL=https://yoursite.tld/Pro/apiv2/api.php
HOSTFACT_KEY=your-api-token
HOSTFACT_TIMEOUT=20
```

Or edit `config/Hostfact.php` directly:

```php
return [
    'api_v2_url'     => env('HOSTFACT_URL', 'https://yoursite.tld/Pro/apiv2/api.php'),
    'api_v2_key'     => env('HOSTFACT_KEY', 'token'),
    'api_v2_timeout' => env('HOSTFACT_TIMEOUT', 20),
];
```

## Usage

Every controller provides a static `new()` factory that reads configuration from Laravel automatically:

```php
use Hyperized\Hostfact\Api\Controllers\Product;
use Hyperized\Hostfact\Api\Entity\Product as ProductEntity;
use Hyperized\Hostfact\Api\Response\ListResponse;

$response = Product::new()->list(['searchfor' => 'hosting']);

if ($response instanceof ListResponse) {
    echo $response->pagination->totalResults . ' results';

    foreach ($response->entities as $product) {
        assert($product instanceof ProductEntity);
        echo $product->ProductName;
        echo $product->PriceExcl;
    }
}
```

For dependency injection or testing, use `fromHttpClient()`:

```php
use Hyperized\Hostfact\Api\Controllers\Invoice;

$invoice = Invoice::fromHttpClient($httpClient);
$result = $invoice->show(['Identifier' => 'F0001']);
```

See the [examples/](examples/) directory for more complete usage patterns.

## Typed Responses

All API methods return an `ApiResponse` subclass:

| Response Type | When | Properties |
|---|---|---|
| `ShowResponse` | Single entity returned | `entity` (typed entity), `data` (DataBag) |
| `ListResponse` | Multiple entities returned | `entities` (list of typed entities), `items` (list of DataBag), `pagination` |
| `ActionResponse` | Action with no entity data (e.g. markAsPaid) | — |
| `ErrorResponse` | API returned an error | `errors` (list of strings) |

All responses share: `controller`, `action`, `status`, `date`, `isSuccess()`, `isError()`, `toArray()`.

### Typed Entities

Responses include typed entity objects with IDE autocompletion and strict PHP types:

```php
use Hyperized\Hostfact\Api\Controllers\Invoice;
use Hyperized\Hostfact\Api\Entity\Invoice as InvoiceEntity;
use Hyperized\Hostfact\Api\Response\ShowResponse;

$response = Invoice::new()->show(['InvoiceCode' => 'F0001']);
assert($response instanceof ShowResponse);

$invoice = $response->entity;
assert($invoice instanceof InvoiceEntity);

$invoice->Identifier;      // ?int
$invoice->InvoiceCode;     // ?string
$invoice->Status;          // ?InvoiceStatus (enum)
$invoice->Date;            // ?DateTimeImmutable
$invoice->AmountExcl;      // ?string (for bcmath precision)
$invoice->Sent;            // ?bool

// Nested entities
foreach ($invoice->InvoiceLines as $line) {
    $line->Description;    // ?string
    $line->PriceExcl;      // ?string
}

// Fallback to DataBag for undocumented fields
$invoice->bag->string('SomeUndocumentedField');
```

For list responses:

```php
$response = Product::new()->list(['searchfor' => 'hosting']);
assert($response instanceof ListResponse);

foreach ($response->entities as $product) {
    assert($product instanceof ProductEntity);
    echo $product->ProductCode;
    echo $product->ProductName;
}
```

Available entity classes: `Product`, `Debtor`, `Invoice`, `Domain`, `Hosting`, `Ssl`, `Vps`, `Ticket`, `Order`, `PriceQuote`, `Creditor`, `Group`. Controllers without documented fields (`Service`, `CreditInvoice`, `Handle`) return a `DataBag` as the entity.

### DataBag

The raw API data is also accessible through typed methods on `DataBag`:

```php
$bag->string('ProductCode')        // string
$bag->int('Identifier')            // int
$bag->float('PriceExcl')           // float
$bag->bool('AutoRenew')            // bool (handles "yes"/"no", 1/0)
$bag->nullableString('Comment')    // ?string
$bag->nullableInt('PackageID')     // ?int
$bag->nullableBool('Sent')         // ?bool
$bag->nullableDateTime('Created')  // ?DateTimeImmutable
$bag->array('Groups')              // array
$bag->bag('Subscription')          // nested DataBag
$bag->bags('InvoiceLines')         // list<DataBag>
$bag->has('SomeField')             // bool
$bag['ProductCode']                // mixed (ArrayAccess)
```

## Available Controllers

| Controller | Actions |
|---|---|
| `CreditInvoice` | show, list, add, edit, delete, partialPayment, markAsPaid, lineAdd, lineDelete, attachmentAdd, attachmentDelete, attachmentDownload |
| `Creditor` | show, list, add, edit, delete, attachmentAdd, attachmentDelete, attachmentDownload |
| `Debtor` | show, list, add, edit, checkLogin, updateLoginCredentials, generatePdf, sendEmail, attachmentAdd, attachmentDelete, attachmentDownload |
| `Domain` | show, list, add, edit, terminate, delete, getToken, lock, unlock, changeNameserver, syncWhois, editWhois, check, transfer, register, autoRenew, listDnsTemplates, getDnsZone, editDnsZone |
| `Group` | show, list, add, edit, delete |
| `Handle` | show, list, add, edit, delete, listDomain |
| `Hosting` | show, list, add, edit, terminate, delete, suspend, unsuspend, create, removeFromServer, getDomainList, emailAccountData, upDowngrade |
| `Invoice` | show, list, add, edit, delete, credit, partialPayment, markAsPaid, markAsUnpaid, sendByEmail, sendReminderByEmail, sendSummationByEmail, download, lineAdd, lineDelete, attachmentAdd, attachmentDelete, attachmentDownload, block, unblock, schedule, cancelSchedule, paymentProcessPause, paymentProcessReactivate |
| `Order` | show, list, add, edit, process, lineAdd, lineDelete |
| `PriceQuote` | show, list, add, edit, delete, sendByEmail, download, accept, decline, lineAdd, lineDelete, attachmentAdd, attachmentDelete, attachmentDownload |
| `Product` | show, list, add, edit, delete |
| `Service` | show, list, add, edit, terminate |
| `Ssl` | show, list, add, edit, terminate, request, markAsInstalled, download, reissue, renew, getStatus, resendApproverEmail, revoke, markAsUninstalled |
| `Ticket` | show, list, add, edit, delete, addMessage, changeStatus, changeOwner, attachmentDownload |
| `Vps` | show, list, add, edit, terminate, create, start, pause, restart, suspend, unsuspend, downloadAccountData, emailAccountData |

## Design

This package provides a thin wrapper around the HostFact API. It does **not** validate input parameters. Consult the [HostFact API documentation](https://www.hostfact.nl/developer/api/) for accepted parameters.

Architecture:
- **Controllers** extend the abstract `Api` class and compose capability **traits** (e.g., `CanShow`, `CanList`, `CanAdd`)
- Each controller implements a corresponding **interface**
- All API methods accept `array<string, mixed>` and return typed `ApiResponse` subclasses
- HTTP transport is handled by Guzzle 7.x

## Testing

```bash
# Full test suite (PHPMD, PHPStan, PHPCS, phpmnd, PHPUnit, Infection)
composer test

# PHPUnit only
composer phpunit -- --configuration phpunit.xml.dist

# Static analysis
composer phpstan -- analyse
```

## License

MIT - see [LICENSE](LICENSE) for details.
