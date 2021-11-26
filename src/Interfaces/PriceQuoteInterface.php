<?php

namespace Hyperized\Hostfact\Interfaces;

interface PriceQuoteInterface extends ApiInterface
{
    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function show(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function list(array $input = []): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function add(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function edit(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function delete(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function sendByEmail(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function download(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function accept(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function decline(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function lineAdd(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function lineDelete(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function attachmentAdd(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function attachmentDelete(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function attachmentDownload(array $input): string;
}
