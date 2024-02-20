<?php

declare(strict_types=1);

namespace app\Services\Type;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Services\Type\TypeServiceInterface;

final class ProxyCheckService implements TypeServiceInterface
{
    private string $url;
    private string $key;
    private string $response;
    private Client $client;

    public function __construct()
    {
        $this->url = env('PROXYCHECK_API_URL');
        $this->key = env('PROXYCHECK_API_KEY');
        $this->client = new Client;
    }

    public function getResponse(string $ip): ?object
    {
        try {
            $this->response = $this->client->get("$this->url/$ip", ['query' => ['key' => $this->key, 'ip' => $ip]])->getBody()->getContents();

            return json_decode($this->response);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public function getType(string $ip): ?string
    {
        return $this->getResponse($ip)?->$ip?->type;
    }

    public function getStatus(string $ip): ?string
    {
        return $this->getResponse($ip)?->status;
    }
}
