<?php

use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

test('a year can be derived from a supported date', function (string $date, int $year) {
    $date = Carbon::parse($date);

    expect(Year::year($date))->toBe($year);
})->with(getZodiacDatasetYears());
