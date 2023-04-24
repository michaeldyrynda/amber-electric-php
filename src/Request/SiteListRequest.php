<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Request;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class SiteListRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/sites';
    }
}
