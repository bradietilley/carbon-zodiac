<?php

use BradieTilley\Zodiac\Constants;
use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

test('a year before the MIN threshold will throw an error', function () {
    $min = Constants::MIN;
    $year = $min - 1;

    expect(fn () => Constants::validate($year))->toThrow(UnsupportedZodiacDateException::class, "The zodiac information for `{$year}` cannot be determined as the date exceeds the minimum of {$min}");
});

test('a year after the MAX threshold will throw an error', function () {
    $max = Constants::MAX;
    $year = $max + 1;

    expect(fn () => Constants::validate($year))->toThrow(UnsupportedZodiacDateException::class, "The zodiac information for `{$year}` cannot be determined as the date exceeds the maximum of {$max}");
});

test('a date before New Year in the MIN Gregorian year resolves to an unsupported prior lunar year', function () {
    // before 1646-02-16 New Year → lunar year 1645 (below MIN)
    expect(fn () => Year::fromDate(Carbon::parse('1646-01-01')))
        ->toThrow(UnsupportedZodiacDateException::class);
});
