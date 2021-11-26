<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanAddAttachment
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function attachmentAdd(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'attachment_add',
                $input
            );
    }
}
