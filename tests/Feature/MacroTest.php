<?php

use BradieTilley\Zodiac\Element;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Zodiac;
use BradieTilley\Zodiac\ZodiacResult;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

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

test('CarbonImmutable macros match Carbon macros', function () {
    Zodiac::boot();

    $mutable = Carbon::parse('1970-02-05');
    $immutable = CarbonImmutable::parse('1970-02-05');

    expect($immutable->zodiacYear()->year)->toBe($mutable->zodiacYear()->year)
        ->and($immutable->zodiacSign())->toBe($mutable->zodiacSign())
        ->and($immutable->zodiacElement())->toBe($mutable->zodiacElement());
});

test('Carbon Macro zodiac returns ZodiacResult', function () {
    Zodiac::boot();

    $result = Carbon::parse('1970-02-06')->zodiac();

    expect($result)->toBeInstanceOf(ZodiacResult::class)
        ->and($result->year->year)->toBe(1970)
        ->and($result->sign)->toBe(Sign::DOG)
        ->and($result->element)->toBe(Element::METAL);
});

test('CarbonImmutable Macro zodiac returns ZodiacResult', function () {
    Zodiac::boot();

    $result = CarbonImmutable::parse('1970-02-06')->zodiac();

    expect($result)->toBeInstanceOf(ZodiacResult::class)
        ->and($result->year->year)->toBe(1970)
        ->and($result->sign)->toBe(Sign::DOG)
        ->and($result->element)->toBe(Element::METAL);
});
