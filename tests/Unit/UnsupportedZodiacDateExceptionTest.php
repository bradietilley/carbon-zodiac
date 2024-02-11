<?php

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use BradieTilley\Zodiac\Constants;
use Carbon\Carbon;

test('an unsupported zodiac date exception can be created', function () {
    $min = Constants::MIN;
    $max = Constants::MAX;

    $expectations = [
        [
            UnsupportedZodiacDateException::exceedsMinimum(Carbon::parse('1100-01-06')),
            "The zodiac information for `1100-01-06` cannot be determined as the date exceeds the minimum of {$min}",
        ],
        [
            UnsupportedZodiacDateException::exceedsMinimum(1100),
            "The zodiac information for `1100` cannot be determined as the date exceeds the minimum of {$min}",
        ],
        [
            UnsupportedZodiacDateException::exceedsMaximum(Carbon::parse('2500-01-06')),
            "The zodiac information for `2500-01-06` cannot be determined as the date exceeds the maximum of {$max}",
        ],
        [
            UnsupportedZodiacDateException::exceedsMaximum(2500),
            "The zodiac information for `2500` cannot be determined as the date exceeds the maximum of {$max}",
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
