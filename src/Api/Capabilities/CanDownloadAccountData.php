<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDownloadAccountData
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function downloadAccountData(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                'downloadaccountdata',
                $input
            );
    }
}
