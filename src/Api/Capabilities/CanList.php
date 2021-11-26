<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanList
{
    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function list(array $input = []): string
    {
        return $this
            ->doRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
