<?php

namespace Msaaq\TikTok\Models;

class Property extends Model
{
    /**
     * @var Content[]
     */
    public array $contents;

    public ?string $content_type = '';

    public ?string $currency = '';

    public ?float $value = null;

    public ?string $query = '';

    public ?string $description = '';

    public string|int|null $order_id = '';

    public string|int|null $shop_id = '';

    /**
     * @param  Content[]  $value
     * @return $this
     */
    public function setContents(array $value): static
    {
        $this->contents = $value;

        return $this;
    }

    public function setContentType(?string $value): static
    {
        $this->content_type = $value ?? '';

        return $this;
    }

    public function setCurrency(?string $value): static
    {
        $this->currency = $value ?? '';

        return $this;
    }

    public function setValue(?float $value): static
    {
        $this->value = $value ?? '';

        return $this;
    }

    public function setQuery(?string $value): static
    {
        $this->query = $value ?? '';

        return $this;
    }

    public function setDescription(?string $value): static
    {
        $this->description = $value ?? '';

        return $this;
    }

    public function setOrderId(string|int|null $value): static
    {
        $this->order_id = (string) $value ?? '';

        return $this;
    }

    public function setShopId(string|int|null $value): static
    {
        $this->shop_id = $value ?? '';

        return $this;
    }
}
