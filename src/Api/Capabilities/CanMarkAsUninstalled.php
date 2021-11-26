<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanMarkAsUninstalled
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function markAsUninstalled(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'uninstalled',
                $input
            );
    }
}
