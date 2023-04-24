<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric;

use RuntimeException;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

abstract class Resource
{
    public function __construct(
        protected AmberElectric $connector
    ) {
    }

    public function send(Request $request): Response
    {
        $response = $this->connector->send($request);

        if ($response->failed()) {
            throw new RuntimeException($response->json('message')); // @phpstan-ignore-line
        }

        return $response;
    }
}
