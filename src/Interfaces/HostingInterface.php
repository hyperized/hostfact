<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use Hyperized\Hostfact\Api\Response\ApiResponse;

interface HostingInterface extends ApiInterface
{
    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function show(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function list(array $input = []): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function add(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function edit(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function terminate(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function delete(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function suspend(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function unsuspend(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function create(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function removeFromServer(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function getDomainList(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function emailAccountData(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function upDowngrade(array $input): ApiResponse;
}
