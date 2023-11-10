<?php

namespace Msaaq\TikTok\Models;

use Msaaq\TikTok\Enums\EventName;

class Event extends Model
{
    public EventName $event;
    public string|int $event_time;
    public string $event_id;

    public User|null $user = null;
    public Property $properties;
    public Page|null $page = null;

    public function setEventName(EventName $value): static
    {
        $this->event = $value;

        return $this;
    }

    public function setEventTime($value): static
    {
        $this->event_time = $value;

        return $this;
    }

    public function setEventId($value): static
    {
        $this->event_id = $value;

        return $this;
    }

    public function setUser(User $value): static
    {
        $this->user = $value;

        return $this;
    }

    public function setProperties(Property $value): static
    {
        $this->properties = $value;

        return $this;
    }

    public function setPage(Page $value): static
    {
        $this->page = $value;

        return $this;
    }
}
