<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Request;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class CurrentSitePriceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $site,
        protected ?int $next = null,
        protected ?int $previous = null,
        protected ?int $resolution = 30
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/sites/{$this->site}/prices/current";
    }

    protected function defaultQuery(): array
    {
        return [
            'next' => $this->next,
            'previous' => $this->previous,
            'resolution' => $this->resolution,
        ];
    }
}
