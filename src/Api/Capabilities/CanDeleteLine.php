<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanDeleteLine
{
    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function lineDelete(array $input): string
    {
        return $this
            ->doRequest(
                self::$name,
                mb_strtolower(self::$name) . 'line_delete',
                $input
            );
    }
}
