namespace App\Services;

use Illuminate\Support\Facades\Http;

class WbApiService
{
    public function get(string $endpoint, array $params = [])
    {
        return Http::get(
            config('api.host') . $endpoint,
            array_merge($params, [
                'key' => config('api.key'),
                'limit' => config('api.limit'),
            ])
        )->json();
    }
}
