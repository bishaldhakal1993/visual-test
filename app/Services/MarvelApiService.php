<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MarvelApiService
{
    /**
     * Calls the Marvel Api.
     *
     * @param string $route
     * @param integer|null $limit
     *
     * @return array
     */
    public static function fetchResults($route, $limit = null)
    {
        $timestamp = time();
        $privateKey = config('services.marvel_api.private_key');
        $publicKey = config('services.marvel_api.public_key');
        $hash = md5($timestamp . $privateKey . $publicKey);
        $url = config('services.marvel_api.url');

        return Http::get($url . $route, [
            'limit' => $limit,
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
        ])->json()['data']['results'];
    }
}
