# Usage

All date APIs accept `DateTimeInterface` (including `Carbon`, `CarbonImmutable`,
and native `DateTime` / `DateTimeImmutable`).

## Carbon macros

After `Zodiac::boot()` (automatic in Laravel):

```php
use Carbon\Carbon;
use Carbon\CarbonImmutable;

$date = Carbon::parse('1970-02-05');
$immutable = CarbonImmutable::parse('1970-02-06');

$date->zodiacYear();       // Year<1969>
$date->zodiacSign();       // Sign::ROOSTER
$date->zodiacElement();    // Element::EARTH

$immutable->zodiacYear();  // Year<1970>
$immutable->zodiacSign();  // Sign::DOG
$immutable->zodiacElement(); // Element::METAL
```

### Aggregate result

```php
$result = $date->zodiac(); // ZodiacResult

$result->datetime; // CarbonImmutable
$result->year;     // Year
$result->sign;     // Sign
$result->element;  // Element

$result->toArray();
```

## Zodiac helper

```php
use BradieTilley\Zodiac\Zodiac;
use Carbon\Carbon;

$date = Carbon::parse('1970-02-06');

Zodiac::fromDate($date);        // ZodiacResult
Zodiac::yearFromDate($date);    // Year
Zodiac::signFromDate($date);    // Sign
Zodiac::elementFromDate($date); // Element
```

## Direct classes

```php
use BradieTilley\Zodiac\Element;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

$date = Carbon::parse('2024-02-10');

Year::fromDate($date);    // Year<2024>
Sign::fromDate($date);    // Sign::DRAGON
Element::fromDate($date); // Element::WOOD

Year::fromYear(2024);
Sign::fromYear(2024);
Element::fromYear(2024);
```

Next: [Years](../years/README.md), [Signs](../signs/README.md), [Elements](../elements/README.md).
