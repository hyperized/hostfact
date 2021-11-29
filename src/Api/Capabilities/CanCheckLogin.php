<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

trait CanCheckLogin
{
    /**
     * @param  string               $controller
     * @param  string               $action
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    abstract public function sendRequest(string $controller, string $action, array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function checkLogin(array $input): array
    {
        return $this
            ->sendRequest(
                self::$name,
                mb_strtolower(__FUNCTION__),
                $input
            );
    }
}
