# Years

The `Year` class wraps a lunar year integer and its New Year commencement date.

```php
use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

$year = Year::fromDate(Carbon::parse('2024-02-10'));
// or
$year = Year::fromYear(2024);

$year->year;      // 2024
$year->date;      // CarbonImmutable start of the lunar year
$year->prev();    // Year<2023>
$year->next();    // Year<2025>
$year->sign();    // Sign::DRAGON
$year->element(); // Element::WOOD
$year->yinYang(); // YinYang::YANG
```

## Serialization

```php
$year->toArray();
/**
 * [
 *   'year' => 2024,
 *   'start' => '2024-02-10',
 *   'end' => '2025-01-28',
 *   'yin_yang' => ['value' => 'yang', 'label' => 'Yang', 'color' => 'white'],
 * ]
 */
```

The `end` date is derived from the start of the **next** lunar year. At the
maximum supported year (`Constants::MAX`), `toArray()` / `next()` throw
`UnsupportedZodiacDateException` because the following New Year is unknown.
