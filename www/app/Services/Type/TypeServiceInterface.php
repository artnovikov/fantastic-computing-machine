<?php

declare(strict_types=1);

namespace app\Services\Type;

interface TypeServiceInterface
{
    public function getResponse(string $ip): ?object;

    public function getType(string $ip): ?string;

    public function getStatus(string $ip): ?string;
}