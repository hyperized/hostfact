<?php declare(strict_types=1);

/**
 * Invoice management examples.
 *
 * See: https://www.hostfact.nl/developer/api/factuur/
 */

use Hyperized\Hostfact\Api\Controllers\Invoice;

// List all invoices
$invoices = Invoice::new()->list([]);

// List invoices for a specific debtor
$invoices = Invoice::new()->list([
    'searchat'  => 'DebtorCode',
    'searchfor' => 'DB0001',
]);

// Show a specific invoice
$invoice = Invoice::new()->show([
    'InvoiceCode' => 'F0001',
]);

// Create a new invoice for a debtor
$newInvoice = Invoice::new()->add([
    'DebtorCode' => 'DB0001',
]);

// Add a line to an invoice
$line = Invoice::new()->lineAdd([
    'InvoiceCode' => 'F0001',
    'Description' => 'Web hosting - 1 year',
    'PriceExcl'   => '49.99',
]);

// Send invoice by email
$sent = Invoice::new()->sendByEmail([
    'InvoiceCode' => 'F0001',
]);

// Download invoice PDF
$pdf = Invoice::new()->download([
    'InvoiceCode' => 'F0001',
]);

// Mark as paid
$paid = Invoice::new()->markAsPaid([
    'InvoiceCode' => 'F0001',
]);

// Credit an invoice
$credited = Invoice::new()->credit([
    'InvoiceCode' => 'F0001',
]);

// Add an attachment
$attachment = Invoice::new()->attachmentAdd([
    'InvoiceCode' => 'F0001',
    'Filename'    => 'contract.pdf',
    'Base64'      => base64_encode(file_get_contents('/path/to/contract.pdf')),
]);

// Schedule invoice
$scheduled = Invoice::new()->schedule([
    'InvoiceCode' => 'F0001',
]);
