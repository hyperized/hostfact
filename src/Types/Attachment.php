<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Attachment
 * @package Hyperized\Wefact\Types
 */
class Attachment extends WefactAPI
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
