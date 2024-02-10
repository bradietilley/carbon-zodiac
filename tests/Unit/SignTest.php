<?php

use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

test('a sign can be derived from a year', function (int $year, string $sign) {
    $sign = Sign::from($sign);

    expect(Sign::fromYear($year))->toBe($sign);
})->with(getZodiacDatasetSigns());

test('a year can be traversed', function () {
    $year = Year::fromDate(Carbon::parse('2004-01-21'));

    expect($year->year)->toBe(2003);
    expect($year->next()->year)->toBe(2004);
    expect($year->next()->next()->year)->toBe(2005);
    expect(($third = $year->next()->next()->next())->year)->toBe(2006);

    expect($third->prev()->prev()->prev()->year)->toBe(2003);
});
