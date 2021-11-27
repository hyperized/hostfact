<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface CreditorInterface extends ApiInterface
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
    public function delete(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function attachmentAdd(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function attachmentDelete(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function attachmentDownload(array $input): string;
}
