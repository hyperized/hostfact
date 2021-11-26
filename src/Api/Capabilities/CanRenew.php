<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanRenew
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function renew(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
