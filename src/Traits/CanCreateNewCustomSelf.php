<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Traits;

use Hyperized\Hostfact\Interfaces\ApiInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;

trait CanCreateNewCustomSelf
{
    /**
     * @param  HttpClientInterface $httpClient
     * @return ApiInterface
     *
     * This method is useful for testing when a custom HTTP client can be provided to mock requests.
     */
    public static function fromCustom(HttpClientInterface $httpClient): ApiInterface
    {
        return new self($httpClient);
    }
}
