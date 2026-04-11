<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanEmailAccountInfo
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function emailAccountData(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                'sendaccountinfobyemail',
                $input
            );
    }
}
