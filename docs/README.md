# Carbon Zodiac

Chinese zodiac helpers for the Carbon date library. Given a Gregorian date, the
package resolves the Chinese New Year threshold for that calendar year, then
derives the lunar **year**, **sign** (12 animals), and **element** (5 elements).

## Documentation

- [Introduction](introduction/README.md)
- [Installation](installation/README.md)
- [Usage](usage/README.md)
- [Years](years/README.md)
- [Signs](signs/README.md)
- [Elements](elements/README.md)
- [Limitations](limitations/README.md)

## Requirements

- PHP 8.3+
- `nesbot/carbon` 2+
- `illuminate/support` 10+ (Laravel service provider auto-discovery; also used for `Collection` helpers)

## Quick start

```bash
composer require bradietilley/carbon-zodiac
```

```php
use BradieTilley\Zodiac\Zodiac;
use Carbon\Carbon;

Zodiac::boot();

$date = Carbon::parse('2024-02-10');

$date->zodiacYear()->year; // 2024
$date->zodiacSign();       // Sign::DRAGON
$date->zodiacElement();    // Element::WOOD
```

See [Installation](installation/README.md) and [Usage](usage/README.md) for the full walkthrough.
