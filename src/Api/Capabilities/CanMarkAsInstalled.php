<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanMarkAsInstalled
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function markAsInstalled(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'installed',
                $input
            );
    }
}
