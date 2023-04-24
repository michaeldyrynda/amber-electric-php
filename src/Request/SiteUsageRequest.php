<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Request;

use Carbon\CarbonInterface;
use Saloon\Enums\Method;
use Saloon\Http\Request;

final class SiteUsageRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $siteId,
        protected CarbonInterface $start,
        protected CarbonInterface $end,
        protected ?int $resolution = 30
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/sites/{$this->siteId}/usage";
    }

    protected function defaultQuery(): array
    {
        return [
            'endDate' => $this->end->toDateString(),
            'resolution' => $this->resolution,
            'startDate' => $this->start->toDateString(),
        ];
    }
}
