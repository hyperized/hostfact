<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use Hyperized\Hostfact\Api\Response\ApiResponse;

interface OrderInterface extends ApiInterface
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
    public function process(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function lineAdd(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function lineDelete(array $input): ApiResponse;
}
