<?php

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use Carbon\Carbon;

test('an unsupported zodiac date exception can be created', function () {
    $expectations = [
        [
            UnsupportedZodiacDateException::exceedsMinimum(Carbon::parse('1800-01-06')),
            "The zodiac information for `1800-01-06` cannot be determined as the date exceeds the minimum of 1904",
        ],
        [
            UnsupportedZodiacDateException::exceedsMinimum(1800),
            "The zodiac information for `1800` cannot be determined as the date exceeds the minimum of 1904",
        ],
        [
            UnsupportedZodiacDateException::exceedsMaximum(Carbon::parse('2500-01-06')),
            "The zodiac information for `2500-01-06` cannot be determined as the date exceeds the maximum of 2033",
        ],
        [
            UnsupportedZodiacDateException::exceedsMaximum(1800),
            "The zodiac information for `1800` cannot be determined as the date exceeds the maximum of 2033",
        ],
        [
            UnsupportedZodiacDateException::unexpected('Foo bar'),
            "Foo bar",
        ],
    ];

    foreach ($expectations as $expectation) {
        expect($expectation[0]->getMessage())->toBe($expectation[1]);
    }
});
