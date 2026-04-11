<?php declare(strict_types=1);

/**
 * Complete customer onboarding flow.
 *
 * This example walks through a realistic scenario: creating a new customer,
 * setting up a hosting service, registering a domain, creating an invoice,
 * and sending it by email.
 *
 * See: https://www.hostfact.nl/developer/api/
 */

use Hyperized\Hostfact\Api\Controllers\Debtor;
use Hyperized\Hostfact\Api\Controllers\Domain;
use Hyperized\Hostfact\Api\Controllers\Hosting;
use Hyperized\Hostfact\Api\Controllers\Invoice;
use Hyperized\Hostfact\Api\Entity\Debtor as DebtorEntity;
use Hyperized\Hostfact\Api\Entity\Hosting as HostingEntity;
use Hyperized\Hostfact\Api\Entity\Invoice as InvoiceEntity;
use Hyperized\Hostfact\Api\Response\ErrorResponse;
use Hyperized\Hostfact\Api\Response\ShowResponse;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;

// ---------------------------------------------------------------------------
// 1. Create the customer (debtor)
// ---------------------------------------------------------------------------

$debtorResponse = Debtor::new()->add([
    'CompanyName'  => 'Webshop BV',
    'Sex'          => 'm',
    'Initials'     => 'J.',
    'SurName'      => 'de Vries',
    'EmailAddress' => 'jan@webshop-bv.test',
    'Street'       => 'Keizersgracht',
    'HouseNumber'  => '100',
    'ZipCode'      => '1015AA',
    'City'         => 'Amsterdam',
    'Country'      => 'NL',
    'TaxNumber'    => 'NL123456789B01',
]);

if ($debtorResponse instanceof ErrorResponse) {
    echo 'Failed to create customer: ' . implode(', ', $debtorResponse->errors);
    exit(1);
}

assert($debtorResponse instanceof ShowResponse);
$debtor = $debtorResponse->entity;
assert($debtor instanceof DebtorEntity);
$debtorCode = $debtor->DebtorCode;
echo "Customer created: {$debtorCode}\n";

// ---------------------------------------------------------------------------
// 2. Register a domain for the customer
// ---------------------------------------------------------------------------

// First check if the domain is available
$checkResponse = Domain::new()->check([
    'Domain' => 'webshop-bv.nl',
]);

$domainResponse = Domain::new()->register([
    'Domain'     => 'webshop-bv.nl',
    'DebtorCode' => $debtorCode,
]);

if ($domainResponse instanceof ErrorResponse) {
    echo 'Domain registration failed: ' . implode(', ', $domainResponse->errors);
    // Continue anyway - the hosting setup doesn't depend on the domain
}

// ---------------------------------------------------------------------------
// 3. Set up hosting for the customer
// ---------------------------------------------------------------------------

$hostingResponse = Hosting::new()->add([
    'DebtorCode'  => $debtorCode,
    'HostingName' => 'webshop-bv.nl',
    'ProductCode' => 'P0001',
]);

if ($hostingResponse instanceof ErrorResponse) {
    echo 'Failed to create hosting: ' . implode(', ', $hostingResponse->errors);
    exit(1);
}

assert($hostingResponse instanceof ShowResponse);
$hosting = $hostingResponse->entity;
assert($hosting instanceof HostingEntity);
$hostingCode = $hosting->bag->string('HostingCode');
echo "Hosting created: {$hostingCode}\n";

// Provision the account on the server
$createResponse = Hosting::new()->create([
    'HostingCode' => $hostingCode,
]);

if ($createResponse->isError()) {
    echo "Warning: could not provision hosting on server\n";
}

// Send the login credentials to the customer
Hosting::new()->emailAccountData([
    'HostingCode' => $hostingCode,
]);

// ---------------------------------------------------------------------------
// 4. Create an invoice for the setup
// ---------------------------------------------------------------------------

$invoiceResponse = Invoice::new()->add([
    'DebtorCode' => $debtorCode,
]);

if ($invoiceResponse instanceof ErrorResponse) {
    echo 'Failed to create invoice: ' . implode(', ', $invoiceResponse->errors);
    exit(1);
}

assert($invoiceResponse instanceof ShowResponse);
$invoice = $invoiceResponse->entity;
assert($invoice instanceof InvoiceEntity);
$invoiceCode = $invoice->InvoiceCode;

// Add the hosting line
Invoice::new()->lineAdd([
    'InvoiceCode' => $invoiceCode,
    'Description' => 'Webhosting - webshop-bv.nl (1 year)',
    'PriceExcl'   => '99.00',
    'TaxPercentage' => '21',
]);

// Add the domain registration line
Invoice::new()->lineAdd([
    'InvoiceCode' => $invoiceCode,
    'Description' => 'Domain registration - webshop-bv.nl (1 year)',
    'PriceExcl'   => '9.95',
    'TaxPercentage' => '21',
]);

echo "Invoice created: {$invoiceCode}\n";

// ---------------------------------------------------------------------------
// 5. Send the invoice to the customer
// ---------------------------------------------------------------------------

$sendResponse = Invoice::new()->sendByEmail([
    'InvoiceCode' => $invoiceCode,
]);

if ($sendResponse->isSuccess()) {
    echo "Invoice {$invoiceCode} sent to jan@webshop-bv.test\n";
}

// ---------------------------------------------------------------------------
// 6. Later: mark the invoice as paid when payment arrives
// ---------------------------------------------------------------------------

$paidResponse = Invoice::new()->markAsPaid([
    'InvoiceCode' => $invoiceCode,
]);

if ($paidResponse->isSuccess()) {
    echo "Invoice {$invoiceCode} marked as paid\n";
}
