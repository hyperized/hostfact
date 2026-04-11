<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanEdit
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function edit(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
