<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDeleteAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function attachmentDelete(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'attachment_delete',
                $input
            );
    }
}
