<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanPayPartial
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function partialPayment(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'partpayment',
                $input
            );
    }
}
