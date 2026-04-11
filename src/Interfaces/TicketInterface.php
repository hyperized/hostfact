<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use Hyperized\Hostfact\Api\Response\ApiResponse;

interface TicketInterface extends ApiInterface
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
    public function delete(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function addMessage(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function changeStatus(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function changeOwner(array $input): ApiResponse;

    /**
     * @param  array<string, mixed> $input
     * @return ApiResponse
     */
    public function attachmentDownload(array $input): ApiResponse;
}
