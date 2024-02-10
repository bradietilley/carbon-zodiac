<?php

use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

test('a year can be derived from a supported date', function (string $date, int $year) {
    $date = Carbon::parse($date);

    expect(Year::year($date))->toBe($year);
})->with(getZodiacDatasetYears());

test('a year can be converted to array', function (string $date, array $expect) {
    $year = Year::fromDate(Carbon::parse($date));

    expect($year->toArray())->toBe($expect);
})->with([
    [
        'date' => '2023-01-02',
        'expect' => [
            'year' => 2022,
            'start' => '2022-02-01',
            'end' => '2023-01-21',
        ],
    ],
    [
        'date' => '2023-01-21',
        'expect' => [
            'year' => 2022,
            'start' => '2022-02-01',
            'end' => '2023-01-21',
        ],
    ],
    [
        'date' => '2023-01-22',
        'expect' => [
            'year' => 2023,
            'start' => '2023-01-22',
            'end' => '2024-02-09',
        ],
    ],
]);
