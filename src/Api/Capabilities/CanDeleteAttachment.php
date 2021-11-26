<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDeleteAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function attachmentDelete(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'attachment_delete',
                $input
            );
    }
}
