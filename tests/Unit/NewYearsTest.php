<?php

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use BradieTilley\Zodiac\NewYears;

test('a year before the MIN threshold will throw an error', function () {
    expect(fn () => NewYears::validate(1000))->toThrow(UnsupportedZodiacDateException::class, 'The zodiac information for `1000` cannot be determined as the date exceeds the minimum of 1904');
});

test('a year before the MAX threshold will throw an error', function () {
    expect(fn () => NewYears::validate(5000))->toThrow(UnsupportedZodiacDateException::class, 'The zodiac information for `5000` cannot be determined as the date exceeds the maximum of 2033');
});
