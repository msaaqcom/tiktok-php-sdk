<?php

namespace Msaaq\TikTok\Requests;

use Illuminate\Http\Client\PendingRequest;
use Msaaq\TikTok\Enums\EventSource;
use Msaaq\TikTok\Models\Event;

class EventRequest
{
    public EventSource $event_source;

    /**
     * Pixel Code
     */
    public string $event_source_id;

    public string|null $test_event_code = null;

    public function __construct(public PendingRequest $http)
    {
    }

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
     * @return array
     * @throws \Exception
     */
    public function execute(Event|array $events): array
    {
        $events = is_array($events) ? $events : [$events];
        foreach ($events as $key => $event) {
            $events[$key] = $event->toArray();
        }

        $request = $this->http->post('/event/track/', [
            'event_source' => $this->event_source->value,
            'event_source_id' => $this->event_source_id,
            'test_event_code' => $this->test_event_code,

            'data' => $events,
        ]);

        $request->onError(function ($request) {
            throw new \Exception($request->json('message'));
        });

        return $request->json();
    }
}
