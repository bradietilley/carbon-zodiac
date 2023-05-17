<?php

use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

test('a year can be derived from a supported date', function (string $date, int $year) {
    $date = Carbon::parse($date);

    expect(Year::fromDate($date))->toBe($year);
})->with(getZodiacDatasetYears());
