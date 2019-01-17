<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\Controllers\Parameters\CreditorAdd;
use Hyperized\Hostfact\Controllers\Parameters\CreditorList;
use Hyperized\Hostfact\Controllers\Parameters\CreditorShow;
use Hyperized\Hostfact\HostfactAPI;


/**
 * Class Creditor
 *
 * @package Hyperized\Hostfact\Endpoints
 */
final class Creditor extends HostfactAPI
{
    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'delete',
        'edit',
        'list',
        'show',
    ];
    /**
     * @var string
     */
    protected $showType = CreditorShow::class;
    /**
     * @var string
     */
    protected $listType = CreditorList::class;
    /**
     * @var string
     */
    protected $addType = CreditorAdd::class;
}
