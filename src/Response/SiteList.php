<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Saloon\Http\Response;

final readonly class SiteList
{
    /**
     * @param  Site[]  $sites
     */
    private function __construct(
        public array $sites
    ) {}

    public static function fromResponse(Response $response): self
    {
        return new self(
            sites: array_map(fn ($site) => Site::fromResponse($site), $response->json()), // @phpstan-ignore-line
        );
    }
}
