# Signs

The `Sign` enum represents the twelve animals of the Chinese zodiac cycle.

```php
use BradieTilley\Zodiac\Sign;
use Carbon\Carbon;

$sign = Sign::fromDate(Carbon::parse('2024-02-10'));
// or
$sign = Sign::fromYear(2024);

$sign;        // Sign::DRAGON
$sign->value; // 'dragon'
$sign->label(); // 'Dragon'
```

## Metadata

```php
$sign->yinYang();      // YinYang
$sign->direction();    // Direction (12-point compass)
$sign->season();       // string, e.g. 'Late Spring'
$sign->fixedElement(); // Element
$sign->trine();        // int 1–4

$sign->symbolPreferTraditional(); // e.g. '龍'
$sign->symbolPreferSimplified();  // e.g. '龙'
```

### Cardinal direction

Prefer `cardinalDirection()` over the deprecated `quadrant()` helper:

```php
$sign->direction()->cardinalDirection(); // CardinalDirection::EAST
$sign->direction()->quadrant();          // 'East' (deprecated)
```

## Serialization

```php
$sign->toArray();
```

Includes value, label, yin/yang, direction (with degrees, quadrant, and
cardinal direction), season, fixed element, trine, and traditional/simplified
symbols.
