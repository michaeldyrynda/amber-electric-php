<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric;

use Dyrynda\AmberElectric\Resource\RenewablesResource;
use Dyrynda\AmberElectric\Resource\SiteResource;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class AmberElectric extends Connector
{
    use AcceptsJson;

    public function __construct(protected string $token)
    {
        $this->withTokenAuth($this->token);
    }

    public function renewables(): RenewablesResource
    {
        return new RenewablesResource($this);
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.amber.com.au/v1';
    }

    public function sites(): SiteResource
    {
        return new SiteResource($this);
    }
}
