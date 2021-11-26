<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanMarkAsInstalled
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function markAsInstalled(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'installed',
                $input
            );
    }
}
