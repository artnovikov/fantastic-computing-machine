<?php

declare(strict_types=1);

namespace app\Services\Location;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Services\Location\LocationServiceInterface;

final class Ip2LocationService implements LocationServiceInterface
{
    private string $url;
    private string $key;
    private string $response;
    private Client $client;

    public function __construct()
    {
        $this->url = env('IP2LOCATION_API_URL');
        $this->key = env('IP2LOCATION_API_KEY');
        $this->client = new Client;
    }

    public function getResponse(string $ip): ?object
    {
        try {
            $this->response = $this->client->get($this->url, ['query' => ['key' => $this->key, 'ip' => $ip]])->getBody()->getContents();

            return json_decode($this->response);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public function getCity(string $ip): ?string
    {
        return $this->getResponse($ip)?->city_name;
    }

    public function getCountry(string $ip): ?string
    {
        return $this->getResponse($ip)?->country_name;
    }
}
