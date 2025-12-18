<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WbApiService
{
    protected $host;
    protected $key;
    protected $limit;

    public function __construct()
    {
        $this->host  = config('api.host');
        $this->key   = config('api.key');
        $this->limit = config('api.limit', 500);
    }

   public function fetchData(string $endpoint, string $dateFrom, ?string $dateTo = null): array
{
    $page = 1;
    $allData = [];

    do {
        $response = Http::get($this->host . '/api/' . $endpoint, [
            'dateFrom' => $dateFrom,
            'dateTo'   => $dateTo,
            'page'     => $page,
            'limit'    => $this->limit,
            'key'      => $this->key,
        ]);

        $data = $response->json();

        if (empty($data)) {
            break;
        }

        $allData = array_merge($allData, $data);
        $page++;

    } while (true);

    return $allData;
}

}
