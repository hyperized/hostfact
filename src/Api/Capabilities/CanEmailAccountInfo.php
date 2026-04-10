<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanEmailAccountInfo
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
                'sendaccountinfobyemail',
                $input
            );
    }
}
