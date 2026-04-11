<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanDeleteLine
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function lineDelete(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name . 'line',
                'delete',
                $input
            );
    }
}
