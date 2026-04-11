<?php declare(strict_types=1);

/**
 * Error handling examples.
 *
 * The package catches transport errors (Guzzle exceptions) and throws
 * InvalidArgumentException. JSON parse failures return an ErrorResponse
 * instead of throwing.
 */

use Hyperized\Hostfact\Api\Controllers\Product;
use Hyperized\Hostfact\Api\Entity\Product as ProductEntity;
use Hyperized\Hostfact\Api\Response\ErrorResponse;
use Hyperized\Hostfact\Api\Response\ListResponse;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;

// Handle transport/connection errors
try {
    $product = Product::new()->show(['Identifier' => '1']);
} catch (InvalidArgumentException $e) {
    // Connection refused, timeout, DNS failure, etc.
    echo 'API call failed: ' . $e->getMessage();
}

// Check for API-level errors in the response
$response = Product::new()->list(['searchfor' => 'nonexistent']);

if ($response instanceof ErrorResponse) {
    // HostFact returned an error response
    foreach ($response->errors as $error) {
        echo 'Error: ' . $error;
    }
}

if ($response instanceof ListResponse) {
    // Process the results using typed entities
    echo 'Found ' . count($response->entities) . ' products';

    foreach ($response->entities as $product) {
        assert($product instanceof ProductEntity);
        echo $product->ProductName;
    }
}

// You can also use the convenience methods
if ($response->isSuccess()) {
    echo 'Request succeeded';
}

if ($response->isError()) {
    echo 'Request failed';
}
