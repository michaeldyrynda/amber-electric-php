<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Saloon\Http\Response;

final readonly class CurrentRenewables
{
    /**
     * @param  Renewables[]  $renewables
     */
    private function __construct(
        public array $renewables
    ) {}

    public static function fromResponse(Response $response): self
    {
        /** @var array */
        $details = $response->json();

        return new self(
            renewables: array_map(fn ($renewables) => Renewables::fromResponse($renewables), $details)
        );
    }
}
