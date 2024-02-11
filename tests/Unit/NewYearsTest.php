<?php

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use BradieTilley\Zodiac\Constants;

test('a year before the MIN threshold will throw an error', function () {
    $min = Constants::MIN;
    $year = $min - 1;

    expect(fn () => Constants::validate($year))->toThrow(UnsupportedZodiacDateException::class, "The zodiac information for `{$year}` cannot be determined as the date exceeds the minimum of {$min}");
});

test('a year before the MAX threshold will throw an error', function () {
    $max = Constants::MAX;
    $year = $max + 1;

    expect(fn () => Constants::validate($year))->toThrow(UnsupportedZodiacDateException::class, "The zodiac information for `{$year}` cannot be determined as the date exceeds the maximum of {$max}");
});
