<?php declare(strict_types=1);

/**
 * Hosting and SSL certificate management examples.
 *
 * See: https://www.hostfact.nl/developer/api/hosting/
 * See: https://www.hostfact.nl/developer/api/ssl/
 */

use Hyperized\Hostfact\Api\Controllers\Hosting;
use Hyperized\Hostfact\Api\Controllers\Ssl;

// --- Hosting ---

// List all hosting accounts
$accounts = Hosting::new()->list([]);

// Create a hosting account on the server
$created = Hosting::new()->create([
    'HostingCode' => 'HO0001',
]);

// Suspend a hosting account
$suspended = Hosting::new()->suspend([
    'HostingCode' => 'HO0001',
]);

// Unsuspend a hosting account
$unsuspended = Hosting::new()->unsuspend([
    'HostingCode' => 'HO0001',
]);

// Get domains linked to this hosting
$domains = Hosting::new()->getDomainList([
    'HostingCode' => 'HO0001',
]);

// Send account info to customer
$emailed = Hosting::new()->emailAccountData([
    'HostingCode' => 'HO0001',
]);

// --- SSL ---

// List SSL certificates
$certificates = Ssl::new()->list([]);

// Request a new SSL certificate
$requested = Ssl::new()->request([
    'SSLCode' => 'SSL0001',
]);

// Reissue an SSL certificate
$reissued = Ssl::new()->reissue([
    'SSLCode' => 'SSL0001',
]);

// Resend approval email
$resent = Ssl::new()->resendApproverEmail([
    'SSLCode' => 'SSL0001',
]);

// Revoke a certificate
$revoked = Ssl::new()->revoke([
    'SSLCode' => 'SSL0001',
]);
