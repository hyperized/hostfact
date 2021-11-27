<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDownloadAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function attachmentDownload(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'attachment_download',
                $input
            );
    }
}
