<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Hyperized\Hostfact\Api\Controllers\CreditInvoice;
use Hyperized\Hostfact\Api\Controllers\Creditor;
use Hyperized\Hostfact\Api\Controllers\Debtor;
use Hyperized\Hostfact\Api\Controllers\Domain;
use Hyperized\Hostfact\Api\Controllers\Group;
use Hyperized\Hostfact\Api\Controllers\Handle;
use Hyperized\Hostfact\Api\Controllers\Hosting;
use Hyperized\Hostfact\Api\Controllers\Invoice;
use Hyperized\Hostfact\Api\Controllers\Order;
use Hyperized\Hostfact\Api\Controllers\PriceQuote;
use Hyperized\Hostfact\Api\Controllers\Product;
use Hyperized\Hostfact\Api\Controllers\Service;
use Hyperized\Hostfact\Api\Controllers\Ssl;
use Hyperized\Hostfact\Api\Controllers\Ticket;
use Hyperized\Hostfact\Api\Controllers\Vps;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * Verifies that every controller capability trait sends the correct
 * controller and action values to the HostFact API.
 */
class ControllerActionMappingTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            'Hyperized\Hostfact\Providers\HostfactServiceProvider',
        ];
    }

    /**
     * @param class-string $controllerClass
     * @return array{controller: object, params: array<string, string>}
     */
    private function callAndCapture(string $controllerClass, string $method): array
    {
        $history = [];

        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'controller' => 'test',
                'action' => 'test',
                'status' => 'success',
            ])),
        ]);

        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($history));

        $guzzle = new GuzzleClient(['handler' => $stack]);

        $stubClient = $this->createStub(HttpClientInterface::class);
        $stubClient->method('getHttpClient')->willReturn($guzzle);

        $controller = $controllerClass::fromHttpClient($stubClient);
        $controller->$method([]);

        $body = (string) $history[0]['request']->getBody();
        parse_str($body, $params);

        return $params;
    }

    /**
     * @return array<string, array{0: class-string, 1: string, 2: string, 3: string}>
     */
    public static function controllerActionProvider(): array
    {
        return [
            // Domain
            'Domain::show' => [Domain::class, 'show', 'domain', 'show'],
            'Domain::list' => [Domain::class, 'list', 'domain', 'list'],
            'Domain::add' => [Domain::class, 'add', 'domain', 'add'],
            'Domain::edit' => [Domain::class, 'edit', 'domain', 'edit'],
            'Domain::terminate' => [Domain::class, 'terminate', 'domain', 'terminate'],
            'Domain::delete' => [Domain::class, 'delete', 'domain', 'delete'],
            'Domain::getToken' => [Domain::class, 'getToken', 'domain', 'gettoken'],
            'Domain::lock' => [Domain::class, 'lock', 'domain', 'lock'],
            'Domain::unlock' => [Domain::class, 'unlock', 'domain', 'unlock'],
            'Domain::changeNameserver' => [Domain::class, 'changeNameserver', 'domain', 'changenameserver'],
            'Domain::syncWhois' => [Domain::class, 'syncWhois', 'domain', 'syncwhois'],
            'Domain::editWhois' => [Domain::class, 'editWhois', 'domain', 'editwhois'],
            'Domain::check' => [Domain::class, 'check', 'domain', 'check'],
            'Domain::transfer' => [Domain::class, 'transfer', 'domain', 'transfer'],
            'Domain::register' => [Domain::class, 'register', 'domain', 'register'],
            'Domain::autoRenew' => [Domain::class, 'autoRenew', 'domain', 'autorenew'],
            'Domain::listDnsTemplates' => [Domain::class, 'listDnsTemplates', 'domain', 'listdnstemplates'],
            'Domain::getDnsZone' => [Domain::class, 'getDnsZone', 'domain', 'getdnszone'],
            'Domain::editDnsZone' => [Domain::class, 'editDnsZone', 'domain', 'editdnszone'],

            // Hosting
            'Hosting::show' => [Hosting::class, 'show', 'hosting', 'show'],
            'Hosting::list' => [Hosting::class, 'list', 'hosting', 'list'],
            'Hosting::add' => [Hosting::class, 'add', 'hosting', 'add'],
            'Hosting::edit' => [Hosting::class, 'edit', 'hosting', 'edit'],
            'Hosting::terminate' => [Hosting::class, 'terminate', 'hosting', 'terminate'],
            'Hosting::delete' => [Hosting::class, 'delete', 'hosting', 'delete'],
            'Hosting::suspend' => [Hosting::class, 'suspend', 'hosting', 'suspend'],
            'Hosting::unsuspend' => [Hosting::class, 'unsuspend', 'hosting', 'unsuspend'],
            'Hosting::create' => [Hosting::class, 'create', 'hosting', 'create'],
            'Hosting::removeFromServer' => [Hosting::class, 'removeFromServer', 'hosting', 'removefromserver'],
            'Hosting::getDomainList' => [Hosting::class, 'getDomainList', 'hosting', 'getdomainlist'],
            'Hosting::emailAccountData' => [Hosting::class, 'emailAccountData', 'hosting', 'sendaccountinfobyemail'],
            'Hosting::upDowngrade' => [Hosting::class, 'upDowngrade', 'hosting', 'updowngrade'],

            // Invoice
            'Invoice::show' => [Invoice::class, 'show', 'invoice', 'show'],
            'Invoice::list' => [Invoice::class, 'list', 'invoice', 'list'],
            'Invoice::add' => [Invoice::class, 'add', 'invoice', 'add'],
            'Invoice::edit' => [Invoice::class, 'edit', 'invoice', 'edit'],
            'Invoice::delete' => [Invoice::class, 'delete', 'invoice', 'delete'],
            'Invoice::credit' => [Invoice::class, 'credit', 'invoice', 'credit'],
            'Invoice::partialPayment' => [Invoice::class, 'partialPayment', 'invoice', 'partpayment'],
            'Invoice::markAsPaid' => [Invoice::class, 'markAsPaid', 'invoice', 'markaspaid'],
            'Invoice::markAsUnpaid' => [Invoice::class, 'markAsUnpaid', 'invoice', 'markasunpaid'],
            'Invoice::sendByEmail' => [Invoice::class, 'sendByEmail', 'invoice', 'sendbyemail'],
            'Invoice::sendReminderByEmail' => [Invoice::class, 'sendReminderByEmail', 'invoice', 'sendreminderbyemail'],
            'Invoice::sendSummationByEmail' => [Invoice::class, 'sendSummationByEmail', 'invoice', 'sendsummationbyemail'],
            'Invoice::download' => [Invoice::class, 'download', 'invoice', 'download'],
            'Invoice::lineAdd' => [Invoice::class, 'lineAdd', 'invoiceline', 'add'],
            'Invoice::lineDelete' => [Invoice::class, 'lineDelete', 'invoiceline', 'delete'],
            'Invoice::attachmentAdd' => [Invoice::class, 'attachmentAdd', 'attachment', 'add'],
            'Invoice::attachmentDelete' => [Invoice::class, 'attachmentDelete', 'attachment', 'delete'],
            'Invoice::attachmentDownload' => [Invoice::class, 'attachmentDownload', 'attachment', 'download'],
            'Invoice::block' => [Invoice::class, 'block', 'invoice', 'block'],
            'Invoice::unblock' => [Invoice::class, 'unblock', 'invoice', 'unblock'],
            'Invoice::schedule' => [Invoice::class, 'schedule', 'invoice', 'schedule'],
            'Invoice::cancelSchedule' => [Invoice::class, 'cancelSchedule', 'invoice', 'cancelschedule'],
            'Invoice::paymentProcessPause' => [Invoice::class, 'paymentProcessPause', 'invoice', 'paymentprocesspause'],
            'Invoice::paymentProcessReactivate' => [Invoice::class, 'paymentProcessReactivate', 'invoice', 'paymentprocessreactivate'],

            // Product
            'Product::show' => [Product::class, 'show', 'product', 'show'],
            'Product::list' => [Product::class, 'list', 'product', 'list'],
            'Product::add' => [Product::class, 'add', 'product', 'add'],
            'Product::edit' => [Product::class, 'edit', 'product', 'edit'],
            'Product::delete' => [Product::class, 'delete', 'product', 'delete'],

            // Ticket
            'Ticket::show' => [Ticket::class, 'show', 'ticket', 'show'],
            'Ticket::list' => [Ticket::class, 'list', 'ticket', 'list'],
            'Ticket::add' => [Ticket::class, 'add', 'ticket', 'add'],
            'Ticket::edit' => [Ticket::class, 'edit', 'ticket', 'edit'],
            'Ticket::delete' => [Ticket::class, 'delete', 'ticket', 'delete'],
            'Ticket::addMessage' => [Ticket::class, 'addMessage', 'ticket', 'addmessage'],
            'Ticket::changeStatus' => [Ticket::class, 'changeStatus', 'ticket', 'changestatus'],
            'Ticket::changeOwner' => [Ticket::class, 'changeOwner', 'ticket', 'changeowner'],
            'Ticket::attachmentDownload' => [Ticket::class, 'attachmentDownload', 'attachment', 'download'],

            // Debtor
            'Debtor::show' => [Debtor::class, 'show', 'debtor', 'show'],
            'Debtor::list' => [Debtor::class, 'list', 'debtor', 'list'],
            'Debtor::add' => [Debtor::class, 'add', 'debtor', 'add'],
            'Debtor::edit' => [Debtor::class, 'edit', 'debtor', 'edit'],
            'Debtor::checkLogin' => [Debtor::class, 'checkLogin', 'debtor', 'checklogin'],
            'Debtor::updateLoginCredentials' => [Debtor::class, 'updateLoginCredentials', 'debtor', 'updatelogincredentials'],
            'Debtor::generatePdf' => [Debtor::class, 'generatePdf', 'debtor', 'generatepdf'],
            'Debtor::sendEmail' => [Debtor::class, 'sendEmail', 'debtor', 'sendemail'],
            'Debtor::attachmentAdd' => [Debtor::class, 'attachmentAdd', 'attachment', 'add'],
            'Debtor::attachmentDelete' => [Debtor::class, 'attachmentDelete', 'attachment', 'delete'],
            'Debtor::attachmentDownload' => [Debtor::class, 'attachmentDownload', 'attachment', 'download'],

            // Service
            'Service::show' => [Service::class, 'show', 'service', 'show'],
            'Service::list' => [Service::class, 'list', 'service', 'list'],
            'Service::add' => [Service::class, 'add', 'service', 'add'],
            'Service::edit' => [Service::class, 'edit', 'service', 'edit'],
            'Service::terminate' => [Service::class, 'terminate', 'service', 'terminate'],

            // Order
            'Order::show' => [Order::class, 'show', 'order', 'show'],
            'Order::list' => [Order::class, 'list', 'order', 'list'],
            'Order::add' => [Order::class, 'add', 'order', 'add'],
            'Order::edit' => [Order::class, 'edit', 'order', 'edit'],
            'Order::delete' => [Order::class, 'delete', 'order', 'delete'],
            'Order::process' => [Order::class, 'process', 'order', 'process'],
            'Order::lineAdd' => [Order::class, 'lineAdd', 'orderline', 'add'],
            'Order::lineDelete' => [Order::class, 'lineDelete', 'orderline', 'delete'],

            // SSL
            'Ssl::show' => [Ssl::class, 'show', 'ssl', 'show'],
            'Ssl::list' => [Ssl::class, 'list', 'ssl', 'list'],
            'Ssl::add' => [Ssl::class, 'add', 'ssl', 'add'],
            'Ssl::edit' => [Ssl::class, 'edit', 'ssl', 'edit'],
            'Ssl::terminate' => [Ssl::class, 'terminate', 'ssl', 'terminate'],
            'Ssl::request' => [Ssl::class, 'request', 'ssl', 'request'],
            'Ssl::markAsInstalled' => [Ssl::class, 'markAsInstalled', 'ssl', 'installed'],
            'Ssl::download' => [Ssl::class, 'download', 'ssl', 'download'],
            'Ssl::reissue' => [Ssl::class, 'reissue', 'ssl', 'reissue'],
            'Ssl::renew' => [Ssl::class, 'renew', 'ssl', 'renew'],
            'Ssl::getStatus' => [Ssl::class, 'getStatus', 'ssl', 'getstatus'],
            'Ssl::resendApproverEmail' => [Ssl::class, 'resendApproverEmail', 'ssl', 'resendapprovermail'],
            'Ssl::revoke' => [Ssl::class, 'revoke', 'ssl', 'revoke'],
            'Ssl::markAsUninstalled' => [Ssl::class, 'markAsUninstalled', 'ssl', 'uninstalled'],

            // VPS
            'Vps::show' => [Vps::class, 'show', 'vps', 'show'],
            'Vps::list' => [Vps::class, 'list', 'vps', 'list'],
            'Vps::add' => [Vps::class, 'add', 'vps', 'add'],
            'Vps::edit' => [Vps::class, 'edit', 'vps', 'edit'],
            'Vps::terminate' => [Vps::class, 'terminate', 'vps', 'terminate'],
            'Vps::create' => [Vps::class, 'create', 'vps', 'create'],
            'Vps::start' => [Vps::class, 'start', 'vps', 'start'],
            'Vps::pause' => [Vps::class, 'pause', 'vps', 'pause'],
            'Vps::restart' => [Vps::class, 'restart', 'vps', 'restart'],
            'Vps::suspend' => [Vps::class, 'suspend', 'vps', 'suspend'],
            'Vps::unsuspend' => [Vps::class, 'unsuspend', 'vps', 'unsuspend'],
            'Vps::downloadAccountData' => [Vps::class, 'downloadAccountData', 'vps', 'downloadaccountdata'],
            'Vps::emailAccountData' => [Vps::class, 'emailAccountData', 'vps', 'sendaccountdatabyemail'],

            // Handle
            'Handle::show' => [Handle::class, 'show', 'handle', 'show'],
            'Handle::list' => [Handle::class, 'list', 'handle', 'list'],
            'Handle::add' => [Handle::class, 'add', 'handle', 'add'],
            'Handle::edit' => [Handle::class, 'edit', 'handle', 'edit'],
            'Handle::delete' => [Handle::class, 'delete', 'handle', 'delete'],
            'Handle::listDomain' => [Handle::class, 'listDomain', 'handle', 'listdomain'],

            // Group
            'Group::show' => [Group::class, 'show', 'group', 'show'],
            'Group::list' => [Group::class, 'list', 'group', 'list'],
            'Group::add' => [Group::class, 'add', 'group', 'add'],
            'Group::edit' => [Group::class, 'edit', 'group', 'edit'],
            'Group::delete' => [Group::class, 'delete', 'group', 'delete'],

            // CreditInvoice
            'CreditInvoice::show' => [CreditInvoice::class, 'show', 'creditinvoice', 'show'],
            'CreditInvoice::list' => [CreditInvoice::class, 'list', 'creditinvoice', 'list'],
            'CreditInvoice::add' => [CreditInvoice::class, 'add', 'creditinvoice', 'add'],
            'CreditInvoice::edit' => [CreditInvoice::class, 'edit', 'creditinvoice', 'edit'],
            'CreditInvoice::delete' => [CreditInvoice::class, 'delete', 'creditinvoice', 'delete'],
            'CreditInvoice::partialPayment' => [CreditInvoice::class, 'partialPayment', 'creditinvoice', 'partpayment'],
            'CreditInvoice::markAsPaid' => [CreditInvoice::class, 'markAsPaid', 'creditinvoice', 'markaspaid'],
            'CreditInvoice::lineAdd' => [CreditInvoice::class, 'lineAdd', 'creditinvoiceline', 'add'],
            'CreditInvoice::lineDelete' => [CreditInvoice::class, 'lineDelete', 'creditinvoiceline', 'delete'],
            'CreditInvoice::attachmentAdd' => [CreditInvoice::class, 'attachmentAdd', 'attachment', 'add'],
            'CreditInvoice::attachmentDelete' => [CreditInvoice::class, 'attachmentDelete', 'attachment', 'delete'],
            'CreditInvoice::attachmentDownload' => [CreditInvoice::class, 'attachmentDownload', 'attachment', 'download'],

            // Creditor
            'Creditor::show' => [Creditor::class, 'show', 'creditor', 'show'],
            'Creditor::list' => [Creditor::class, 'list', 'creditor', 'list'],
            'Creditor::add' => [Creditor::class, 'add', 'creditor', 'add'],
            'Creditor::edit' => [Creditor::class, 'edit', 'creditor', 'edit'],
            'Creditor::delete' => [Creditor::class, 'delete', 'creditor', 'delete'],
            'Creditor::attachmentAdd' => [Creditor::class, 'attachmentAdd', 'attachment', 'add'],
            'Creditor::attachmentDelete' => [Creditor::class, 'attachmentDelete', 'attachment', 'delete'],
            'Creditor::attachmentDownload' => [Creditor::class, 'attachmentDownload', 'attachment', 'download'],

            // PriceQuote
            'PriceQuote::show' => [PriceQuote::class, 'show', 'pricequote', 'show'],
            'PriceQuote::list' => [PriceQuote::class, 'list', 'pricequote', 'list'],
            'PriceQuote::add' => [PriceQuote::class, 'add', 'pricequote', 'add'],
            'PriceQuote::edit' => [PriceQuote::class, 'edit', 'pricequote', 'edit'],
            'PriceQuote::delete' => [PriceQuote::class, 'delete', 'pricequote', 'delete'],
            'PriceQuote::sendByEmail' => [PriceQuote::class, 'sendByEmail', 'pricequote', 'sendbyemail'],
            'PriceQuote::download' => [PriceQuote::class, 'download', 'pricequote', 'download'],
            'PriceQuote::accept' => [PriceQuote::class, 'accept', 'pricequote', 'accept'],
            'PriceQuote::decline' => [PriceQuote::class, 'decline', 'pricequote', 'decline'],
            'PriceQuote::lineAdd' => [PriceQuote::class, 'lineAdd', 'pricequoteline', 'add'],
            'PriceQuote::lineDelete' => [PriceQuote::class, 'lineDelete', 'pricequoteline', 'delete'],
            'PriceQuote::attachmentAdd' => [PriceQuote::class, 'attachmentAdd', 'attachment', 'add'],
            'PriceQuote::attachmentDelete' => [PriceQuote::class, 'attachmentDelete', 'attachment', 'delete'],
            'PriceQuote::attachmentDownload' => [PriceQuote::class, 'attachmentDownload', 'attachment', 'download'],
        ];
    }

    /**
     * @param class-string $controllerClass
     */
    #[DataProvider('controllerActionProvider')]
    public function testControllerSendsCorrectAction(
        string $controllerClass,
        string $method,
        string $expectedController,
        string $expectedAction
    ): void {
        $params = $this->callAndCapture($controllerClass, $method);

        self::assertSame(
            $expectedController,
            $params['controller'],
            "Controller name mismatch for {$controllerClass}::{$method}"
        );
        self::assertSame(
            $expectedAction,
            $params['action'],
            "Action name mismatch for {$controllerClass}::{$method}"
        );
    }
}
