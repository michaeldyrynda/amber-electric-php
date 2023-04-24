<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Request;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Saloon\Enums\Method;
use Saloon\Http\Request;

final class SitePriceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $siteId,
        protected ?CarbonInterface $start = null,
        protected ?CarbonInterface $end = null,
        protected ?int $resolution = 30
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/sites/{$this->siteId}/prices";
    }

    protected function defaultQuery(): array
    {
        return [
            'endDate' => CarbonImmutable::parse($this->end)->toDateString(),
            'resolution' => $this->resolution,
            'startDate' => CarbonImmutable::parse($this->start)->toDateString(),
        ];
    }
}
