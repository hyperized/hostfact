<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use Hyperized\Hostfact\Api\Response\ApiResponse;

interface SslInterface extends ApiInterface
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
    public function request(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function markAsInstalled(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function download(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function reissue(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function renew(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function getStatus(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function resendApproverEmail(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function revoke(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function markAsUninstalled(array $input): ApiResponse;
}
