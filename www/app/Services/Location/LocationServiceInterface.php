<?php

declare(strict_types=1);

namespace app\Services\Location;

interface LocationServiceInterface
{
    public function getResponse(string $ip): ?object;

    public function getCity(string $ip): ?string;

    public function getCountry(string $ip): ?string;
}