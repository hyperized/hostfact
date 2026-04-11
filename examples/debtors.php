<?php declare(strict_types=1);

/**
 * Debtor (customer) management examples.
 *
 * See: https://www.hostfact.nl/developer/api/debiteur/
 */

use Hyperized\Hostfact\Api\Controllers\Debtor;

// List all debtors
$debtors = Debtor::new()->list([]);

// Search for a debtor by company name
$results = Debtor::new()->list([
    'searchat'  => 'CompanyName',
    'searchfor' => 'Acme',
]);

// Show a specific debtor
$debtor = Debtor::new()->show([
    'DebtorCode' => 'DB0001',
]);

// Add a new debtor
$newDebtor = Debtor::new()->add([
    'CompanyName'  => 'Acme Corp',
    'Sex'          => 'm',
    'Initials'     => 'J.',
    'SurName'      => 'Doe',
    'EmailAddress' => 'john@acme.test',
    'Street'       => 'Main Street',
    'HouseNumber'  => '42',
    'ZipCode'      => '1234AB',
    'City'         => 'Amsterdam',
    'Country'      => 'NL',
]);

// Edit an existing debtor
$updated = Debtor::new()->edit([
    'Identifier' => '1',
    'City'       => 'Rotterdam',
]);

// Delete a debtor
$deleted = Debtor::new()->delete([
    'Identifier' => '1',
]);
