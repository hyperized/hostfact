<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanAddLine
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function lineAdd(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name . 'line',
                'add',
                $input
            );
    }
}
