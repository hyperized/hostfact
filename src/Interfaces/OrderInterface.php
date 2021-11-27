<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface OrderInterface extends ApiInterface
{
    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function show(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function list(array $input = []): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function add(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function edit(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function process(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function lineAdd(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function lineDelete(array $input): array;
}
