<?php

use BradieTilley\Zodiac\Element;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Zodiac;
use Carbon\Carbon;

test('Carbon Macro zodiacYear', function (string $date, int $year) {
    Zodiac::boot();

    $date = Carbon::parse($date);
    expect($date->zodiacYear()->year)->toBe($year);
})->with(getZodiacDatasetYears());

test('Carbon Macro zodiacElement', function (int $year, string $element) {
    Zodiac::boot();

    $element = Element::from($element);

    $date = Carbon::parse("{$year}-06-01");
    expect($date->zodiacElement())->toBe($element);
})->with(getZodiacDatasetElements());

test('Carbon Macro zodiacSign', function (int $year, string $sign) {
    Zodiac::boot();

    $sign = Sign::from($sign);

    $date = Carbon::parse("{$year}-06-01");
    expect($date->zodiacSign())->toBe($sign);
})->with(getZodiacDatasetSigns());
