<?php

namespace Msaaq\TikTok\Models;

class User extends Model
{
    /**
     * TikTok Click ID
     */
    public string|null $ttclid = '';

    /**
     * Cookie ID (_ttp).
     */
    public string|null $ttp = '';
    public string|null $ip = '';
    public string|null $user_agent = '';

    public array $email;
    public array $phone;
    public array $external_id;

    public function setClickId(?string $ttclid): static
    {
        $this->ttclid = $ttclid ?? '';

        return $this;
    }

    public function setCookieId(?string $ttp): static
    {
        $this->ttp = $ttp ?? '';

        return $this;
    }

    public function setIpAddress(?string $ip): static
    {
        $this->ip = $ip ?? '';

        return $this;
    }

    public function setUserAgent(?string $userAgent): static
    {
        $this->user_agent = $userAgent ?? '';

        return $this;
    }

    public function setEmails(array $emails): static
    {
        $this->email = $this->hashArrayValue($emails);

        return $this;
    }

    public function setPhones(array $phones): static
    {
        $this->phone = $this->hashArrayValue($phones);

        return $this;
    }

    public function setExternalIds(array $ids): static
    {
        $this->external_id = $this->hashArrayValue($ids);

        return $this;
    }
}
