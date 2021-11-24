<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanEmailAccountData
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function emailAccountData(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'sendaccountdatabyemail',
                $input
            );
    }
}
