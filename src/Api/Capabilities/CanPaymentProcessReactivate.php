<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanPaymentProcessReactivate
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function paymentProcessReactivate(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'payment_process_reactivate',
                $input
            );
    }
}
