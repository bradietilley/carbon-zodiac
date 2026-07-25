# Introduction

Carbon Zodiac maps Gregorian dates to Chinese zodiac metadata using published
Chinese New Year (Lunar New Year) commencement dates.

## How resolution works

1. Take a Gregorian date (any `DateTimeInterface`, including `Carbon` / `CarbonImmutable`).
2. Look up that calendar year's New Year threshold in `Constants::NEW_YEAR_THRESHOLDS`.
3. If the date is before the threshold, it belongs to the **previous** lunar year.
4. From the lunar year integer, derive:
   - **Sign** — 12-year animal cycle (Rat → Pig)
   - **Element** — 10-year stem cycle mapped to Wood / Fire / Earth / Metal / Water
   - **Yin / Yang** — odd years are Yin, even years are Yang (on `Year`)

Signs also expose traditional metadata such as direction, season, fixed element,
trine, and Chinese symbols.

## Entry points

| Approach | Example |
| --- | --- |
| Carbon macros | `$date->zodiacSign()` |
| Aggregate result | `$date->zodiac()` / `Zodiac::fromDate($date)` |
| Direct classes | `Year::fromDate($date)`, `Sign::fromYear(2024)` |

Continue with [Installation](../installation/README.md).
