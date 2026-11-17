<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Saloon\Http\Response;

final readonly class SitePrice
{
    /**
     * @param  Price[]  $prices
     */
    private function __construct(
        public array $prices
    ) {}

    public static function fromResponse(Response $response): self
    {
        return new self(
            prices: array_map(fn ($usage) => Price::fromResponse($usage), $response->json()), // @phpstan-ignore-line
        );
    }
}
