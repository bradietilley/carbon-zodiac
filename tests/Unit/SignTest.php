<?php

use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Year;
use Carbon\Carbon;

test('a sign can be derived from a year', function (int $year, string $sign) {
    $sign = Sign::from($sign);

    expect(Sign::fromYear($year))->toBe($sign);
})->with(getZodiacDatasetSigns());

test('a sign can be converted to array', function (string $date, array $expect) {
    $sign = Sign::fromDate(Carbon::parse($date));

    expect($sign->toArray())->toBe($expect);
})->with([
    [
        'date' => '2001-05-03',
        'expect' => [
            'value' => 'snake',
            'label' => 'Snake',
            'data' => [
                'yin_yang' => [
                    'value' => 'yin',
                    'label' => 'Yin',
                ],
                'direction' => 'South',
                'season' => 'Early Summer',
                'fixed_element' => [
                    'value' => 'fire',
                    'label' => 'Fire',
                ],
                'trine' => 2,
            ],
        ],
    ],
    [
        'date' => '2001-01-23',
        'expect' => [
            'value' => 'dragon',
            'label' => 'Dragon',
            'data' => [
                'yin_yang' => [
                    'value' => 'yang',
                    'label' => 'Yang',
                ],
                'direction' => 'East',
                'season' => 'Late Spring',
                'fixed_element' => [
                    'value' => 'earth',
                    'label' => 'Earth',
                ],
                'trine' => 1,
            ],
        ],
    ],
    [
        'date' => '2001-01-24',
        'expect' => [
            'value' => 'snake',
            'label' => 'Snake',
            'data' => [
                'yin_yang' => [
                    'value' => 'yin',
                    'label' => 'Yin',
                ],
                'direction' => 'South',
                'season' => 'Early Summer',
                'fixed_element' => [
                    'value' => 'fire',
                    'label' => 'Fire',
                ],
                'trine' => 2,
            ],
        ],
    ],
]);

test('a year can be traversed', function () {
    $year = Year::fromDate(Carbon::parse('2004-01-21'));

    expect($year->year)->toBe(2003);
    expect($year->next()->year)->toBe(2004);
    expect($year->next()->next()->year)->toBe(2005);
    expect(($third = $year->next()->next()->next())->year)->toBe(2006);

    expect($third->prev()->prev()->prev()->year)->toBe(2003);
});
