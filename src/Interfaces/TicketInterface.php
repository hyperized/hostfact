<?php

namespace Hyperized\Hostfact\Interfaces;

interface TicketInterface extends ApiInterface
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
    public function addMessage(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function changeStatus(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function changeOwner(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function attachmentDownload(array $input): string;
}
