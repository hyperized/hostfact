<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanPayPartial
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function partialPayment(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                'partpayment',
                $input
            );
    }
}
