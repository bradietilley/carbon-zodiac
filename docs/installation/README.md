# Installation

```bash
composer require bradietilley/carbon-zodiac
```

## Requirements

| Package | PHP | Carbon | illuminate/support |
| --- | --- | --- | --- |
| v2.1+ | 8.3+ | ≥ 2.0 | ≥ 10.0 |

## Laravel

The package registers `BradieTilley\Zodiac\Laravel\ZodiacServiceProvider` via
Composer auto-discovery. That provider calls `Zodiac::boot()` so Carbon macros
are available without further setup.

## Non-Laravel / manual boot

If you are not using Laravel (or discovery is disabled), boot the macros once:

```php
use BradieTilley\Zodiac\Zodiac;

Zodiac::boot();
```

This registers macros on both `Carbon\Carbon` and `Carbon\CarbonImmutable`.

You can also skip macros entirely and call `Zodiac`, `Year`, `Sign`, and
`Element` directly — see [Usage](../usage/README.md).
