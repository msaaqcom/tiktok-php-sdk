<?php

namespace Msaaq\TikTok;

use Illuminate\Http\Client\PendingRequest;
use Msaaq\TikTok\Requests\EventRequest;
use Msaaq\TikTok\Support\HttpClient;

class TikTok
{
    private PendingRequest $http;

    public function __construct(public string $accessToken, public string $pixelId)
    {
        $this->http = HttpClient::http($this->accessToken);
    }

    public function events(): EventRequest
    {
        return (new EventRequest($this->http))->setPixelCode($this->pixelId);
    }

    public function client(): PendingRequest
    {
        return $this->http;
    }
}
