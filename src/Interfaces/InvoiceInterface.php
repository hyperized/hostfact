<?php

namespace Hyperized\Hostfact\Interfaces;

interface InvoiceInterface extends ApiInterface
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
    public function credit(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function partialPayment(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function markAsPaid(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function markAsUnpaid(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function sendByEmail(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function sendReminderByEmail(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function sendSummationByEmail(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function download(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function lineAdd(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function lineDelete(array $input): string;

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

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function block(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function unblock(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function schedule(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function cancelSchedule(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function paymentProcessPause(array $input): string;

    /**
     * @param  array<string, mixed> $input
     * @return string
     */
    public function paymentProcessReactivate(array $input): string;
}
