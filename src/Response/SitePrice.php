<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Saloon\Contracts\Response;

final readonly class SitePrice
{
    /**
     * @param  \Dyrynda\AmberElectric\Response\Price[]  $prices
     */
    private function __construct(
        public array $prices
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        return new self(
            prices: array_map(fn ($usage) => Price::fromResponse($usage), $response->json()), // @phpstan-ignore-line
        );
    }
}
