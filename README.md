# TikTok Events API PHP Wrapper

## Requirements

- PHP 8.1 and later.

## Installation

```composer
composer require msaaq/tiktok-php-sdk
```

## Usage

```php
$tiktok = new \Msaaq\TikTok\TikTok(accessToken: $token, pixelId: $pixelId);

$user = new \Msaaq\TikTok\Models\User();
$user->setUserAgent($_SERVER['HTTP_USER_AGENT'])
     ->setIpAddress($_SERVER['REMOTE_ADDR'])
     ->setEmails(['name@example.com']) // optional
     ->setPhones(['+12133734253']) // optional
     ->setClickId($_REQUEST['ttclid']) // if available
     ->setCookieId($_COOKIE['ttp'])
     ->setExternalIds(['user-id-in-our-system']); // optional
     
$page = new \Msaaq\TikTok\Models\Page();
$page->setUrl('https://example.com')
     ->setReferrer('https://example.com'); // optional
           
// Set products
$contents = [];
$order->items->map(function ($item) use (&$contents) {
    $contents[] = (new \Msaaq\TikTok\Models\Content)
        ->setPrice($item->price)
        ->setQuantity($item->quantity)
        ->setContentId($item->product_id)
        ->setContentName($item->item_title);
});

$properties = new \Msaaq\TikTok\Models\Property();
$properties->setCurrency('USD')
           ->setQuery('COUPON_CODE')
           ->setValue(100.99)
           ->setOrderId('order_id')
           ->setContents($contents)

$eventA = new \Msaaq\TikTok\Models\Event();
$eventA->setEventName(\Msaaq\TikTok\Enums\EventName::COMPLETE_PAYMENT)
       ->setEventTime(time())
       ->setEventId($order->uuid)
       ->setUser($value)
       ->setPage($page)
       ->setProperties($properties)
       ->setUser($value);

$eventB = new \Msaaq\TikTok\Models\Event();
$eventB->setEventName(\Msaaq\TikTok\Enums\EventName::PLACE_AN_ORDER)
       ->setEventTime(time())
       ->setEventId($order->uuid)
       ->setUser($value)
       ->setPage($page)
       ->setProperties($properties)
       ->setUser($value);
```

### Start event request

```php
$eventRequest = $tiktok->events()
            ->setEventSource(\Msaaq\TikTok\Enums\EventSource::WEB);
if (!empty($testCode)) {
       $eventRequest->setTestEventCode($testCode); // optional 
}
```

### Sending a single event

```php
$eventRequest->execute($eventA);
```

### Batching multiple events in a single payload

You can report up to 1000 objects in one request.
If a request contains more than 1,000 events, the entire request will be rejected.

```php
$eventRequest->execute([$eventA, $eventB]);
```

> To optimize campaign performance, it's highly recommended to send the event in real-time (without batching) as soon as
> it is seen on the advertiser's server.
