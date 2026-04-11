<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanAddAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function attachmentAdd(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                'attachment',
                'add',
                $input
            );
    }
}
