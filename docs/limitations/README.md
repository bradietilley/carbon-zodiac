# Limitations

## Supported date range

Only dates that resolve to lunar years **1646–2644** (inclusive) are supported.

| Constant | Value | Meaning |
| --- | --- | --- |
| `Constants::MIN` | 1646 | Earliest Gregorian / lunar year accepted |
| `Constants::MAX` | 2644 | Latest year with New Year threshold data |

Dates before New Year in Gregorian year 1646 resolve to lunar year 1645 and are
rejected — this one-year margin avoids ambiguous lookups at the start of the
threshold table.

Out-of-range dates throw `BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException`.

To extend the range, open a pull request that updates
`Constants::NEW_YEAR_THRESHOLDS` and cites your source(s).

## Sources

**Lunar New Year thresholds**

Thresholds in `Constants` are sourced primarily from
[pinyin.info Chinese New Year tables](https://pinyin.info/chinese_new_year/index.html),
cross-checked against Hong Kong Observatory dates for the overlapping century.

**Sign and element cycles**

Cycle math is conventional (12-year animal cycle from a Rat-aligned epoch;
element stems from the year modulo 10). Cross-checked against multiple public
references.

**Sign metadata**

Direction, season, fixed element, trine, and related sign attributes are drawn
from commonly published Chinese zodiac tables (including Wikipedia). Treat
cultural/interpretive fields with appropriate caution; New Year → year/sign/
element resolution is the package's primary guarantee.
