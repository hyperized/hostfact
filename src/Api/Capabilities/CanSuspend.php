<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanSuspend
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function suspend(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
