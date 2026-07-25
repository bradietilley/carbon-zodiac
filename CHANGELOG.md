# CHANGELOG

## 2.1.0

### Added

- `ZodiacResult` aggregate DTO (`fromDate()`, `toArray()`) with year, sign, and element
- `Zodiac::fromDate()` and Carbon / CarbonImmutable `zodiac()` macro returning `ZodiacResult`
- Carbon macros registered on `CarbonImmutable` as well as `Carbon`
- `CardinalDirection` enum and `Direction::cardinalDirection()`
- `Direction` / `YinYang` enums, year yin/yang, Chinese sign symbols, and related metadata shipped since v2.0.0
- Documentation under `docs/` for [bradietilley.dev](https://bradietilley.dev/carbon-zodiac)
- `LICENSE.md` and this changelog

### Changed

- Require PHP `^8.3` and declare `nesbot/carbon` `>=2.0` explicitly
- Supported range floor (`Constants::MIN`) moved from `1645` to `1646`
- CI matrix covers PHP 8.3–8.4; static analysis runs on PHP 8.3
- `Direction::toArray()` includes `cardinal_direction`
- Root README slimmed to install + quick example; full docs live under `docs/`

### Deprecated

- `Direction::quadrant()` — use `Direction::cardinalDirection()` instead
- `Element::sequence()` / `Element::ordered()` — prefer:

  ```diff
  - Element::sequence()
  + array_values(array_unique(Element::index()))
  ```

### Fixed

- Docblocks that mislabeled Sign / Element / YinYang conversion helpers
- README inaccuracies around supported range and the old `NewYears` naming

### Upgrade notes

1. Upgrade the host environment to PHP 8.3+.
2. Update the package constraint to `^2.1`.
3. Earliest supported lunar year is now **1646** (was 1645). Dates that resolve to 1645 throw `UnsupportedZodiacDateException`.
4. Prefer `$direction->cardinalDirection()` over `$direction->quadrant()`.
5. Prefer `array_values(array_unique(Element::index()))` over `Element::sequence()`.
6. If you serialize `Sign` / `Direction` via `toArray()`, expect a new `cardinal_direction` key under direction data.
