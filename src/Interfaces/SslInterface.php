<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface SslInterface extends ApiInterface
{
    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function show(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function list(array $input = []): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function add(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function edit(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function terminate(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function request(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function markAsInstalled(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function download(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function reissue(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function renew(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function getStatus(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function resendApproverEmail(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function revoke(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function markAsUninstalled(array $input): string;
}
