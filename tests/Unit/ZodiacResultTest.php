<?php

use BradieTilley\Zodiac\Element;
use BradieTilley\Zodiac\Sign;
use BradieTilley\Zodiac\Zodiac;
use BradieTilley\Zodiac\ZodiacResult;
use Carbon\Carbon;

test('ZodiacResult resolves year, sign and element around a New Year boundary', function () {
    $before = ZodiacResult::fromDate(Carbon::parse('1970-02-05'));
    $after = ZodiacResult::fromDate(Carbon::parse('1970-02-06'));

    expect($before->year->year)->toBe(1969)
        ->and($before->sign)->toBe(Sign::ROOSTER)
        ->and($before->element)->toBe(Element::EARTH)
        ->and($before->datetime->toDateString())->toBe('1970-02-05');

    expect($after->year->year)->toBe(1970)
        ->and($after->sign)->toBe(Sign::DOG)
        ->and($after->element)->toBe(Element::METAL)
        ->and($after->datetime->toDateString())->toBe('1970-02-06');
});

test('Zodiac::fromDate returns a ZodiacResult', function () {
    $result = Zodiac::fromDate(Carbon::parse('2024-02-10'));

    expect($result)->toBeInstanceOf(ZodiacResult::class)
        ->and($result->year->year)->toBe(2024)
        ->and($result->sign)->toBe(Sign::DRAGON)
        ->and($result->element)->toBe(Element::WOOD);
});

test('ZodiacResult can be converted to array', function () {
    $result = ZodiacResult::fromDate(Carbon::parse('2024-02-10'));

    expect($result->toArray())->toMatchArray([
        'datetime' => '2024-02-10 00:00:00',
        'year' => [
            'year' => 2024,
            'start' => '2024-02-10',
            'end' => '2025-01-28',
            'yin_yang' => [
                'value' => 'yang',
                'label' => 'Yang',
                'color' => 'white',
            ],
        ],
        'element' => [
            'value' => 'wood',
            'label' => 'Wood',
        ],
    ])->and($result->toArray()['sign']['value'])->toBe('dragon');
});
