<?php

use BradieTilley\Zodiac\Sign;

test('a sign can be derived from a year', function (int $year, string $sign) {
    $sign = Sign::from($sign);

    expect(Sign::fromYear($year))->toBe($sign);
})->with(getZodiacDatasetSigns());
