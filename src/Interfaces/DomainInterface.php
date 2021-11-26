<?php

namespace Hyperized\Hostfact\Interfaces;

interface DomainInterface extends ApiInterface
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
    public function delete(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function getToken(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function lock(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function unlock(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function changeNameserver(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function syncWhois(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function editWhois(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function check(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function transfer(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function register(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function autoRenew(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function listDnsTemplates(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function getDnsZone(array $input): string;

    /**
     * @param array<string, mixed> $input
     * @return string
     */
    public function editDnsZone(array $input): string;
}
