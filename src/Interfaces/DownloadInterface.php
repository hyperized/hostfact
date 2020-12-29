<?php


namespace Hyperized\Hostfact\Interfaces;


interface DownloadInterface
{
    public function download($model): bool;
}