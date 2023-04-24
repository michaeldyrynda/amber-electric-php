<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Saloon\Contracts\Response;

final readonly class CurrentRenewables
{
    /**
     * @param  \Dyrynda\AmberElectric\Response\Renewables[]  $renewables
     */
    private function __construct(
        public array $renewables
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        /** @var array */
        $details = $response->json();

        return new self(
            renewables: array_map(fn ($renewables) => Renewables::fromResponse($renewables), $details)
        );
    }
}
