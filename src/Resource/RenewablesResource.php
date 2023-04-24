<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Resource;

use Dyrynda\AmberElectric\Enum\State;
use Dyrynda\AmberElectric\Request\CurrentRenewablesRequest;
use Dyrynda\AmberElectric\Resource;
use Dyrynda\AmberElectric\Response\CurrentRenewables;

class RenewablesResource extends Resource
{
    public function current(State $state): CurrentRenewables
    {
        return CurrentRenewables::fromResponse(
            $this->connector->send(new CurrentRenewablesRequest($state))
        );
    }
}
