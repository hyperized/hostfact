<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanMarkAsPaid
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function markAsPaid(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                mb_strtolower(__FUNCTION__),
                $input
            );
    }
}
