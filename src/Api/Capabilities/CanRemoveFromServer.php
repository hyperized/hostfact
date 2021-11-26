<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanRemoveFromServer
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function removeFromServer(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                mb_strtolower(__FUNCTION__),
                $input
            );
    }
}
