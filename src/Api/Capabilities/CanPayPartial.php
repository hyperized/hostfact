<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanPayPartial
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function partialPayment(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'partpayment',
                $input
            );
    }
}
