<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use Hyperized\Hostfact\Api\Response\ApiResponse;

interface VpsInterface extends ApiInterface
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
    public function create(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function start(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function pause(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function restart(array $input): ApiResponse;

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
    public function downloadAccountData(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function emailAccountData(array $input): ApiResponse;
}
