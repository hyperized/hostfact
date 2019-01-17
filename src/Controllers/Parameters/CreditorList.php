<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Controllers\Parameters;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class CreditorList
 *
 * @package Hyperized\Hostfact\Controllers\Parameters
 */
final class CreditorList extends ParameterAbstract
{
    /**
     * @Assert\Type("integer")
     */
    protected $offset;
    /**
     * @Assert\Type("integer")
     */
    protected $limit;
    /**
     * @Assert\Type("string")
     */
    protected $sort;
    /**
     * @Assert\Choice({"DESC", "ASC"})
     */
    protected $order;
    /**
     * @Assert\Type("string")
     */
    protected $searchat;
    /**
     * @Assert\Type("string")
     */
    protected $searchfor;
    /**
     * @Assert\Type("integer")
     */
    protected $group;
    /**
     * @Assert\DateTime
     */
    protected $created;
    /**
     * @Assert\DateTime
     */
    protected $modified;
}
