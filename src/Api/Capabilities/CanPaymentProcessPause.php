<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanPaymentProcessPause
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function paymentProcessPause(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'payment_process_pause',
                $input
            );
    }
}
