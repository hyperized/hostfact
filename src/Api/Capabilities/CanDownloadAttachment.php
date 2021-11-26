<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDownloadAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function attachmentDownload(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'attachment_download',
                $input
            );
    }
}
