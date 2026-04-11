<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanDeleteAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function attachmentDelete(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                'attachment',
                'delete',
                $input
            );
    }
}
