<?php

declare(strict_types=1);

namespace App\Actions;

use App\Services\Location\LocationServiceInterface;
use App\Services\Type\TypeServiceInterface;

final class CheckProxiesAction
{
    public function __construct(private LocationServiceInterface $locationService, private TypeServiceInterface $typeService)
    {

    }

    public function __invoke(string $ips): array
    {
        $proxies = preg_split('/\n|\r\n?/', $ips);

        $proxiesInfo = array_map(function ($proxy) {
            [$ip, $port] = explode(':', $proxy);
            
            return [
                'ip' => $ip,
                'type' => $this->typeService->getType($ip),
                'status' => $this->typeService->getStatus($ip),
                'country' => $this->locationService->getCountry($ip),
                'city' => $this->locationService->getCity($ip),
            ];
        }, $proxies);

        return $proxiesInfo;
    }
}
