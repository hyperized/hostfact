<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanProcess
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function process(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
