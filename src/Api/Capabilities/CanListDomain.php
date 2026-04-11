<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanListDomain
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function listDomain(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                strtolower(__FUNCTION__),
                $input
            );
    }
}
