<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanCredit
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function credit(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
