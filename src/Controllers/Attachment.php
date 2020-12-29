<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\Interfaces\AddInterface;
use Hyperized\Hostfact\Interfaces\DeleteInterface;
use Hyperized\Hostfact\Interfaces\DownloadInterface;
use Hyperized\Hostfact\Interfaces\ModelInterface;

/**
 * Class Attachment
 *
 * @package Hyperized\Hostfact\Types
 */
class Attachment implements AddInterface, DeleteInterface, DownloadInterface
{
    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'delete',
        'download',
    ];
}
