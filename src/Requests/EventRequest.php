<?php

namespace Msaaq\TikTok\Requests;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Msaaq\TikTok\Enums\EventSource;
use Msaaq\TikTok\Exceptions\AccessTokenIncorrectOrRevokedException;
use Msaaq\TikTok\Exceptions\NoPermissionException;
use Msaaq\TikTok\Models\Event;

class EventRequest
{
    public EventSource $event_source;

    /**
     * Pixel Code
     */
    public string $event_source_id;

    public ?string $test_event_code = null;

    public function __construct(public PendingRequest $http) {}

    public function setPixelCode(string $code): static
    {
        $this->event_source_id = $code;

        return $this;
    }

    public function setEventSource(EventSource $eventSource): static
    {
        $this->event_source = $eventSource;

        return $this;
    }

    public function setTestEventCode(string $testCode): static
    {
        $this->test_event_code = $testCode;

        return $this;
    }

    /**
     * @param  Event|Event[]  $events
     *
     * @throws \Exception
     */
    public function execute(Event|array $events): array
    {
        $events = is_array($events) ? $events : [$events];
        foreach ($events as $key => $event) {
            $events[$key] = $event->toArray();
        }

        $requestData = [
            'event_source' => $this->event_source->value,
            'event_source_id' => $this->event_source_id,

            'data' => $events,
        ];

        if (!empty($this->test_event_code)) {
            $requestData['test_event_code'] = $this->test_event_code;
        }

        $request = $this->http->post('/event/track/', $requestData);

        $request->onError(function ($request) {
            $errorCode = $request->json('code');

            throw match ($errorCode) {
                40001 => new NoPermissionException($request->json('message')),
                40105 => new AccessTokenIncorrectOrRevokedException($request->json('message')),
                default => new Exception($request->json('message'), $errorCode),
            };
        });

        return $request->json();
    }
}
