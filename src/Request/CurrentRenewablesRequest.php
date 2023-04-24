<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Request;

use Dyrynda\AmberElectric\Enum\State;
use Saloon\Enums\Method;
use Saloon\Http\Request;

final class CurrentRenewablesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected State $state
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/state/{$this->state->value}/renewables/current";
    }
}
