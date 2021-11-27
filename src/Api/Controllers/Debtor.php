<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanAddAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanCheckLogin;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanDownloadAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanGeneratePdf;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanSendEmail;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanUpdateLoginCredentials;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\DebtorInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Types\Url;

class Debtor extends ApiClient implements DebtorInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanCheckLogin;
    use CanUpdateLoginCredentials;
    use CanGeneratePdf;
    use CanSendEmail;
    use CanAddAttachment;
    use CanDeleteAttachment;
    use CanDownloadAttachment;

    protected static string $name = 'debtor';

    public static function new(): self
    {
        return new self(
            HttpClient::new(
                Url::fromString(
                    ApiClient::getUrlFromConfig()
                )
            )
        );
    }

    public static function fromHttpClient(HttpClientInterface $httpClient): self
    {
        return new self($httpClient);
    }
}
