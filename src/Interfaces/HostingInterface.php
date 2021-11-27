<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface HostingInterface extends ApiInterface
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
    public function terminate(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function delete(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function suspend(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function unsuspend(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function create(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function removeFromServer(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function getDomainList(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function emailAccountData(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function upDowngrade(array $input): array;
}
