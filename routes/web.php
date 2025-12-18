<?php

use Illuminate\Support\Facades\Route;
use App\Services\WbApiService;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Income;
use App\Models\Stock;

Route::get('/', function () {
    return 'WB API project is running';
});


Route::get('/fetch-sales', function () {
    set_time_limit(0);

    $service = new WbApiService();
    $data = $service->fetchData('sales', '2025-12-01', '2025-12-15');

    foreach ($data as $item) {
        $apiId = $item['sale_id']
            ?? $item['g_number']
            ?? md5(json_encode($item));

        Sale::updateOrCreate(
            ['api_id' => (string) $apiId],
            ['payload' => json_encode($item)]
        );
    }

    return 'Sales fetched!';
});


Route::get('/fetch-orders', function () {
    set_time_limit(0);

    $service = new WbApiService();
    $data = $service->fetchData('orders', '2025-12-01', '2025-12-15');

    foreach ($data as $item) {
        $apiId = $item['g_number']
            ?? $item['odid']
            ?? md5(json_encode($item));

        Order::updateOrCreate(
            ['api_id' => (string) $apiId],
            ['payload' => json_encode($item)]
        );
    }

    return 'Orders fetched!';
});

Route::get('/fetch-incomes', function () {
    set_time_limit(0);

    $service = new WbApiService();
    $data = $service->fetchData('incomes', '2025-12-01', '2025-12-15');

    foreach ($data as $item) {
        $apiId = $item['income_id']
            ?? md5(json_encode($item));

        Income::updateOrCreate(
            ['api_id' => (string) $apiId],
            ['payload' => json_encode($item)]
        );
    }

    return 'Incomes fetched!';
});

Route::get('/fetch-stocks', function () {
    set_time_limit(0);

    $service = new WbApiService();
    $data = $service->fetchData('stocks', date('Y-m-d'));

    foreach ($data as $item) {
        $apiId = md5(
            ($item['nm_id'] ?? '') .
            ($item['warehouse_name'] ?? '')
        );

        Stock::updateOrCreate(
            ['api_id' => $apiId],
            ['payload' => json_encode($item)]
        );
    }

    return 'Stocks fetched!';
});


