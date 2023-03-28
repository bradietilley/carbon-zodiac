# Carbon Zodiac

A simple package that provides an interface for converting dates to Zodiac signs and elements.

### Installation

```
composer require bradietilley/carbon-zodiac
```

### Usage

You may either use the `Carbon` macros, use a centralized class, or use each class/enum directly. Here are a few examples:

**Using Carbon Macros:**

```php
use Carbon\Carbon;
use BradieTilley\Zodiac\Zodiac;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Element;

/** To leverage Carbon macros run the boot method: */
Zodiac::boot();

/** Set up some dummy dates */
$date1 = Carbon::parse('1970-02-05');
$date2 = Carbon::parse('1970-02-06');

/** Convert a date to a zodiac year */
$date1->zodiacYear(); // 1969
$date2->zodiacYear(); // 1970

/** Convert a date to a zodiac sign */
$date1->zodiacSign(); // Sign::ROOSTER
$date2->zodiacSign(); // Sign::DOG

/** Convert a date to a zodiac element */
$date1->zodiacElement(); // Element::EARTH
$date2->zodiacElement(); // Element::METAL
```

**Using Zodiac Helper:**

```php
use Carbon\Carbon;
use BradieTilley\Zodiac\Zodiac;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Element;

/** Set up some dummy dates */
$date1 = Carbon::parse('1970-02-05');
$date2 = Carbon::parse('1970-02-06');

/** Convert a date to a zodiac year */
Zodiac::yearFromDate($date1); // 1969
Zodiac::yearFromDate($date2); // 1970

/** Convert a date to a zodiac sign */
Zodiac::signFromDate($date1); // Sign::ROOSTER
Zodiac::signFromDate($date2); // Sign::DOG

/** Convert a date to a zodiac element */
Zodiac::elementFromDate($date1); // Element::EARTH
Zodiac::elementFromDate($date2); // Element::METAL
```

**Using Classes Directly:**

```php
use Carbon\Carbon;
use BradieTilley\Zodiac\Zodiac;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Element;

/** Set up some dummy dates */
$date1 = Carbon::parse('1970-02-05');
$date2 = Carbon::parse('1970-02-06');

/** Convert a date to a zodiac year */
Year::fromDate($date1); // 1969
Year::fromDate($date2); // 1970

/** Convert a date to a zodiac sign */
Sign::fromDate($date1); // Sign::ROOSTER
Sign::fromDate($date2); // Sign::DOG

/** Convert a date to a zodiac element */
Element::fromDate($date1); // Element::EARTH
Element::fromDate($date2); // Element::METAL
```

# Extended Usage

Given a zodiac `Sign` enum instance, you can then find more details of the sign by leveraging a few helper methods:

```php
$rooster = Sign::fromDate(Carbon::parse('1970-02-05')):
$dog = Sign::fromDate(Carbon::parse('1970-02-06')):

$rooster->yinYang();      // Yin
$rooster->direction();    // West
$rooster->season();       // Mid-Autumn
$rooster->fixedElement(); // Metal
$rooster->trine();        // 2

$dog->yinYang();          // Yang
$dog->direction();        // West
$dog->season();           // Late Autumn
$dog->fixedElement();     // Earth
$dog->trine();            // 3
```

### Issues and Notice:

There's no guarantee anything here is perfect, but it's so far gotten every date correct I have tried. If you spot any issues please open an issue in GitHub.

### Author

- [Bradie Tilley](https://github.com/bradietilley)