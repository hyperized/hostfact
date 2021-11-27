<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface DebtorInterface extends ApiInterface
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
    public function checkLogin(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function updateLoginCredentials(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function generatePdf(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function sendEmail(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function attachmentAdd(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function attachmentDelete(array $input): array;

    /**
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function attachmentDownload(array $input): array;
}
