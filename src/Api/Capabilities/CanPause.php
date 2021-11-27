<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanPause
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function pause(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
