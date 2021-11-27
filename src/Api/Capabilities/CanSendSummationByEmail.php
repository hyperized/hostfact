<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanSendSummationByEmail
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function sendSummationByEmail(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                mb_strtolower(__FUNCTION__),
                $input
            );
    }
}
