<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanPaymentProcessPause
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function paymentProcessPause(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'payment_process_pause',
                $input
            );
    }
}
