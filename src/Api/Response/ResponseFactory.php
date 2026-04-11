<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

use Hyperized\Hostfact\Api\Entity\EntityFactory;

final class ResponseFactory
{
    /**
     * @var array<string, string>
     */
    private const SINGULAR_KEYS = [
        'product' => 'product',
        'invoice' => 'invoice',
        'debtor' => 'debtor',
        'domain' => 'domain',
        'hosting' => 'hosting',
        'service' => 'service',
        'ssl' => 'ssl',
        'vps' => 'vps',
        'ticket' => 'ticket',
        'order' => 'order',
        'pricequote' => 'pricequote',
        'creditor' => 'creditor',
        'creditinvoice' => 'creditinvoice',
        'group' => 'group',
        'handle' => 'handle',
    ];

    /**
     * @var array<string, string>
     */
    private const PLURAL_KEYS = [
        'product' => 'products',
        'invoice' => 'invoices',
        'debtor' => 'debtors',
        'domain' => 'domains',
        'hosting' => 'hostings',
        'service' => 'services',
        'ssl' => 'ssls',
        'vps' => 'vpses',
        'ticket' => 'tickets',
        'order' => 'orders',
        'pricequote' => 'pricequotes',
        'creditor' => 'creditors',
        'creditinvoice' => 'creditinvoices',
        'group' => 'groups',
        'handle' => 'handles',
    ];

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): ApiResponse
    {
        $controller = self::extractString($data, 'controller', 'unknown');
        $action = self::extractString($data, 'action', 'unknown');
        $status = Status::tryFrom(
            self::extractString($data, 'status', '')
        ) ?? Status::Error;
        $date = new \DateTimeImmutable(
            self::extractString($data, 'date', 'now')
        );

        if ($status === Status::Error) {
            return new ErrorResponse(
                $controller,
                $action,
                $status,
                $date,
                self::extractErrors($data),
                $data,
            );
        }

        $pluralKey = self::PLURAL_KEYS[$controller] ?? null;
        if ($pluralKey !== null) {
            $pluralData = $data[$pluralKey] ?? null;
            if (is_array($pluralData)) {
                /** @var list<DataBag> $items */
                $items = [];
                $entities = [];
                foreach ($pluralData as $item) {
                    if (is_array($item)) {
                        /** @var array<string, mixed> $item */
                        $bag = new DataBag($item);
                        $items[] = $bag;
                        $entities[] = EntityFactory::fromBag($controller, $bag);
                    }
                }

                return new ListResponse(
                    $controller,
                    $action,
                    $status,
                    $date,
                    Pagination::fromArray($data),
                    $items,
                    $entities,
                    $data,
                );
            }
        }

        $singularKey = self::SINGULAR_KEYS[$controller] ?? null;
        if ($singularKey !== null) {
            $singularData = $data[$singularKey] ?? null;
            if (is_array($singularData)) {
                /** @var array<string, mixed> $entityData */
                $entityData = $singularData;
                $bag = new DataBag($entityData);

                return new ShowResponse(
                    $controller,
                    $action,
                    $status,
                    $date,
                    $bag,
                    EntityFactory::fromBag($controller, $bag),
                    $data,
                );
            }
        }

        return new ActionResponse($controller, $action, $status, $date, $data);
    }

    /**
     * @param array<string, mixed> $data
     */
    private static function extractString(
        array $data,
        string $key,
        string $default
    ): string {
        $value = $data[$key] ?? null;

        return is_string($value) ? $value : $default;
    }

    /**
     * @param array<string, mixed> $data
     * @return list<string>
     */
    private static function extractErrors(array $data): array
    {
        $raw = $data['errors'] ?? [];

        /** @var list<string> $errors */
        $errors = [];

        if (is_array($raw)) {
            foreach ($raw as $error) {
                $errors[] = is_scalar($error) ? (string) $error : '';
            }
        }

        return $errors;
    }
}
