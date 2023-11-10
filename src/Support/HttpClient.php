<?php

namespace Msaaq\TikTok\Support;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    const API_BASE_URL = 'https://business-api.tiktok.com/open_api/v1.3';

    public static function http(string $token): PendingRequest
    {
        return Http::baseUrl(self::API_BASE_URL)
            ->withHeader('Access-Token', $token)
            ->asJson();
    }
}
