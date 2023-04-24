<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Saloon\Contracts\Response;

final readonly class SiteUsage
{
    /**
     * @param  \Dyrynda\AmberElectric\Response\Usage[]  $usage
     */
    private function __construct(
        public array $usage
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        return new self(
            usage: array_map(fn ($usage) => Usage::fromResponse($usage), $response->json()), // @phpstan-ignore-line
        );
    }
}
