<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Traits;

use Hyperized\Hostfact\Interfaces\ApiInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;

trait CanCreateNewCustomSelf
{
    public static function fromCustom(
        HttpClientInterface $httpClient,
    ): ApiInterface
    {
        return new self(
            $httpClient,
        );
    }
}