<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanMarkAsUninstalled
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function markAsUninstalled(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'uninstalled',
                $input
            );
    }
}
