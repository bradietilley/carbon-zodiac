# Elements

The `Element` enum represents the five elements (Wu Xing): Wood, Fire, Earth,
Metal, and Water.

```php
use BradieTilley\Zodiac\Element;
use Carbon\Carbon;

$element = Element::fromDate(Carbon::parse('2024-02-10'));
// or
$element = Element::fromYear(2024);

$element;         // Element::WOOD
$element->value;  // 'wood'
$element->label(); // 'Wood'
```

## Year → element mapping

Elements are resolved from the year's last digit via `Element::index()`:

```php
Element::index();
// [0 => Metal, 1 => Metal, 2 => Water, 3 => Water, ..., 8 => Earth, 9 => Earth]
```

## Deprecated: `sequence()` / `ordered()`

`Element::sequence()` (and `ordered()`, which wraps it) are deprecated. Prefer:

```diff
- Element::sequence()
+ array_values(array_unique(Element::index()))
```

```diff
- Element::ordered()
+ Collection::make(array_values(array_unique(Element::index())))
```

## Serialization

```php
$element->toArray();
// ['value' => 'wood', 'label' => 'Wood']
```
