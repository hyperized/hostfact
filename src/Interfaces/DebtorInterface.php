<?php

namespace Hyperized\Hostfact\Interfaces;

interface DebtorInterface extends ApiInterface
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
    public function checkLogin(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function updateLoginCredentials(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function generatePdf(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function sendEmail(array $input): string;

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
