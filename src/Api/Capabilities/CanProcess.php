<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanProcess
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function process(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                __FUNCTION__,
                $input
            );
    }
}
