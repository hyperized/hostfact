<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanAddAttachment
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function attachmentAdd(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'attachment_add',
                $input
            );
    }
}
