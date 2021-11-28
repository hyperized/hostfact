<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDeleteLine
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function lineDelete(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                mb_strtolower(self::$name) . 'line_delete',
                $input
            );
    }
}
