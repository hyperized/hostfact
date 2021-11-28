<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanEmailAccountData
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function emailAccountData(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                'sendaccountdatabyemail',
                $input
            );
    }
}
