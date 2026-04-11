<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanResendApproverEmail
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function resendApproverEmail(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                self::$name,
                'resendapprovermail',
                $input
            );
    }
}
