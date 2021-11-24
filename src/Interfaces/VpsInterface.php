<?php

namespace Hyperized\Hostfact\Interfaces;

interface VpsInterface extends ApiInterface
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
    public function terminate(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function create(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function start(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function pause(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function restart(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function suspend(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function unsuspend(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function downloadAccountData(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function emailAccountData(array $input): string;
}