<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Resource;

use Carbon\CarbonInterface;
use Dyrynda\AmberElectric\Request\CurrentSitePriceRequest;
use Dyrynda\AmberElectric\Request\SiteListRequest;
use Dyrynda\AmberElectric\Request\SitePriceRequest;
use Dyrynda\AmberElectric\Request\SiteUsageRequest;
use Dyrynda\AmberElectric\Resource;
use Dyrynda\AmberElectric\Response\CurrentSitePrice;
use Dyrynda\AmberElectric\Response\SiteList;
use Dyrynda\AmberElectric\Response\SitePrice;
use Dyrynda\AmberElectric\Response\SiteUsage;

class SiteResource extends Resource
{
    public function all(): SiteList
    {
        return SiteList::fromResponse(
            $this->send(new SiteListRequest)
        );
    }

    public function currentPrices(
        string $site,
        ?int $next = null,
        ?int $previous = null,
        ?int $resolution = 30
    ): CurrentSitePrice {
        return CurrentSitePrice::fromResponse(
            $this->send(new CurrentSitePriceRequest($site, $next, $previous, $resolution))
        );
    }

    public function prices(
        string $site,
        ?CarbonInterface $start = null,
        ?CarbonInterface $end = null,
        ?int $resolution = 30
    ): SitePrice {
        return SitePrice::fromResponse(
            $this->send(new SitePriceRequest($site, $start, $end, $resolution))
        );
    }

    public function usage(string $site, CarbonInterface $start, CarbonInterface $end): SiteUsage
    {
        return SiteUsage::fromResponse(
            $this->send(new SiteUsageRequest($site, $start, $end))
        );
    }
}
