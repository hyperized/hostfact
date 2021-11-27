<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDecline
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function decline(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
