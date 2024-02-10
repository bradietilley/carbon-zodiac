# Carbon Zodiac

A simple package that provides an interface for converting dates to Zodiac signs and elements.

### Installation

```
composer require bradietilley/carbon-zodiac
```

### Limitations

Currently, only dates between 1648 and 2644 are supported. If you'd like to utilise this package for dates beyond that range, please make a pull request which includes your requested updates to the `NewYears::THRESHOLDS` constant and please cite your source(s).

### Usage

You may either use the `Carbon` macros, use the `BradieTilley\Zodiac\Zodiac` class, or use each class/enum directly. Here are a few examples:

**Using Carbon Macros:**

Laravel will auto boot the Carbon macros, but should you need to boot it yourself
on non-Laravel projects that use `Carbon\Carbon`, it's really easy:

```php
\BradieTilley\Zodiac\Zodiac::boot();
```

Once booted, or in Laravel apps, you can leverage the `Carbon` macros to fetch the data you need:

```php
use Carbon\Carbon;
use BradieTilley\Zodiac\Zodiac;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Element;

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

Alternatively you may wish to not leverage the `Carbon` macros at all, which can be achieved via the `Zodiac` helper:

```php
use Carbon\Carbon;
use BradieTilley\Zodiac\Zodiac;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Element;

/** Set up some dummy dates */
$date1 = Carbon::parse('1970-02-05');
$date2 = Carbon::parse('1970-02-06');

/** Convert a date to a zodiac year */
Zodiac::yearFromDate($date1); // Year<1969>
Zodiac::yearFromDate($date2); // Year<1970>

/** Convert a date to a zodiac sign */
Zodiac::signFromDate($date1); // Sign::ROOSTER
Zodiac::signFromDate($date2); // Sign::DOG

/** Convert a date to a zodiac element */
Zodiac::elementFromDate($date1); // Element::EARTH
Zodiac::elementFromDate($date2); // Element::METAL
```

For now, only Carbon instances are supported. Future releases might scale this back to be any `DateTimeInterface`.

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
Year::fromDate($date1); // Year<1969>
Year::fromDate($date2); // Year<1970>

/** Convert a date to a zodiac sign */
Sign::fromDate($date1); // Sign::ROOSTER
Sign::fromDate($date2); // Sign::DOG

/** Convert a date to a zodiac element */
Element::fromDate($date1); // Element::EARTH
Element::fromDate($date2); // Element::METAL
```

## Extended Usage

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

## The `Year` class

The `Year` class is a DTO wrapping the integer year (e.g. `2024`) and includes 
helper methods to traverse through the years, fetch the associated `Sign` and `Element`,
and determine the start / end date of the year.

Example usage:


```php
$year = Year::fromDate(Carbon::parse('2024-02-10'));
$year = Year::fromYear(2024); // same as above

$year->prev(); // Year<2023>
$year->next(); // Year<2025>

$year->sign(); // Sign::DRAGON
$year->element(); // Element::WOOD

json_encode($year->toArray());
/**
 * {
 *     "year": 2024,
 *     "start": "2024-02-10",
 *     "end": "2025-01-28"
 * }
 */
```

## The `Sign` enum

The `Sign` enum is a PHP Enum object that contains the 12 signs, and can be resolved
via the `from*` methods, amongst other approaches documented elsewhere.

Example usage:

```php
$sign = Sign::fromDate(Carbon::parse('2024-02-10'));
$sign = Sign::fromYear(2024); // same as above

$sign; // Sign::DRAGON

$sign->value; // dragon
$sign->label(); // Dragon

json_encode($sign->toArray());
/**
 * {
 *     "value": "dragon",
 *     "label": "Dragon",
 *     "data": {
 *         "yin_yang": "Yang",
 *         "direction": "East",
 *         "season": "Late Spring",
 *         "fixed_element": {
 *             "value": "earth",
 *             "label": "Earth"
 *         },
 *         "trine": 1
 *     }
 * }
 */
```


## The `Element` enum

The `Element` enum is a PHP Enum object that contains the 5 elements, and can be resolved
via the `from*` methods, amongst other approaches documented elsewhere.

Example usage:

```php
$element = Element::fromDate(Carbon::parse('2024-02-10'));
$element = SigElementn::fromYear(2024); // same as above

$element; // Element::WOOD

$element->value; // wood
$element->label(); // Wood

json_encode($element->toArray());
/**
 * {
 *     "value": "wood",
 *     "label": "Wood",
 * }
 */
```

## Other Usage

There's probably more features or ways to interact with these objects so feel free to have a browse into the code see what's possible.

## Issues and Notice:

There's no guarantee anything here is perfect, but it's so far gotten every date correct I have tried. If you spot any issues please open an issue in GitHub.

## Author

- [Bradie Tilley](https://github.com/bradietilley)

## Source

**Lunar New Year thresholds:**

In the `NewYears` class I've noted the source. Huge thanks to them, and their source.

**Element and Sign cycles:**

Sourced from _various_ online places to ensure the cycling of signs and elements are correct. No source cited for this, currently.

**Element extra information**

This refers to an Element's season, direction, fixed element, trine, etc. This data was sourced from... Wikipedia. Take it with a grain of salt, but from what I can tell, it's "correct" 🤷

## License

MIT... or whatever is the "use it and have fun without needing to worry about anything" license is.

If you use it and are happy to share your project name/URL, feel free to mention it in a PR and add it below or something.

## Where it's used;

- Nowhere yet. lol.