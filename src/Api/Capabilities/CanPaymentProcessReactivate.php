<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanPaymentProcessReactivate
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function paymentProcessReactivate(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'payment_process_reactivate',
                $input
            );
    }
}
