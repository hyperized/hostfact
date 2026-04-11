<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanMarkAsInstalled
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function markAsInstalled(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                'installed',
                $input
            );
    }
}
