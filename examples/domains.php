<?php declare(strict_types=1);

/**
 * Domain management examples.
 *
 * See: https://www.hostfact.nl/developer/api/domein/
 */

use Hyperized\Hostfact\Api\Controllers\Domain;

// List all domains
$domains = Domain::new()->list([]);

// Show domain details
$domain = Domain::new()->show([
    'DomainCode' => 'DM0001',
]);

// Register a new domain
$registered = Domain::new()->register([
    'Domain'     => 'example.nl',
    'DebtorCode' => 'DB0001',
    'HandleCode' => 'HN0001',
]);

// Transfer a domain
$transferred = Domain::new()->transfer([
    'Domain'     => 'example.nl',
    'DebtorCode' => 'DB0001',
    'AuthCode'   => 'abc123',
]);

// Edit nameservers
$ns = Domain::new()->changeNameserver([
    'DomainCode'  => 'DM0001',
    'Nameserver1' => 'ns1.example.nl',
    'Nameserver2' => 'ns2.example.nl',
]);

// Get DNS zone
$dns = Domain::new()->getDnsZone([
    'DomainCode' => 'DM0001',
]);

// Edit DNS zone
$updated = Domain::new()->editDnsZone([
    'DomainCode' => 'DM0001',
    'DNSZone'    => [
        ['Name' => '@', 'Type' => 'A', 'Content' => '1.2.3.4', 'TTL' => '3600'],
    ],
]);

// Lock a domain
$locked = Domain::new()->lock([
    'DomainCode' => 'DM0001',
]);

// Check domain availability
$available = Domain::new()->check([
    'Domain' => 'example.nl',
]);
