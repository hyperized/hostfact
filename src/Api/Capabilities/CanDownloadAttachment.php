<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Response\ApiResponse;

trait CanDownloadAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function attachmentDownload(array $input): ApiResponse
    {
        return $this
            ->sendRequest(
                'attachment',
                'download',
                $input
            );
    }
}
