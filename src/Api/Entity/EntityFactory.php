<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final class EntityFactory
{
    /**
     * @var array<string, class-string<Entity>>
     */
    private const ENTITY_MAP = [
        'product' => Product::class,
        'debtor' => Debtor::class,
        'invoice' => Invoice::class,
        'domain' => Domain::class,
        'hosting' => Hosting::class,
        'ssl' => Ssl::class,
        'vps' => Vps::class,
        'ticket' => Ticket::class,
        'order' => Order::class,
        'pricequote' => PriceQuote::class,
        'creditor' => Creditor::class,
        'group' => Group::class,
    ];

    public static function fromBag(string $controller, DataBag $bag): Entity|DataBag
    {
        $class = self::ENTITY_MAP[$controller] ?? null;

        if ($class === null) {
            return $bag;
        }

        return $class::fromBag($bag);
    }
}
