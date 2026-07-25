# Carbon Zodiac

Chinese zodiac helpers for the Carbon date library — resolve Gregorian dates to
zodiac year, sign, and element.

![Static Analysis](https://github.com/bradietilley/carbon-zodiac/actions/workflows/static.yml/badge.svg)
![Tests](https://github.com/bradietilley/carbon-zodiac/actions/workflows/tests.yml/badge.svg)
![PHP Version](https://img.shields.io/badge/PHP%20Version-%E2%89%A58.3-4F5B93)

## Documentation

Full documentation is available at [bradietilley.dev/carbon-zodiac](https://bradietilley.dev/carbon-zodiac).

## Installation

```bash
composer require bradietilley/carbon-zodiac
```

```php
use BradieTilley\Zodiac\Zodiac;
use Carbon\Carbon;

Zodiac::boot(); // automatic in Laravel via service provider

$date = Carbon::parse('1970-02-06');

$date->zodiacYear();    // Year<1970>
$date->zodiacSign();    // Sign::DOG
$date->zodiacElement(); // Element::METAL

$result = $date->zodiac();
$result->year;    // Year
$result->sign;    // Sign::DOG
$result->element; // Element::METAL
```

See the [documentation](https://bradietilley.dev/carbon-zodiac) for years, signs, elements, limitations, and sources.

## Credits

- [Bradie Tilley](https://github.com/bradietilley)
