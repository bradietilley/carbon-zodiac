<?php

use BradieTilley\Zodiac\Element;

test('an element can be derived from a year', function (int $year, string $element) {
    $element = Element::from($element);
    
    expect(Element::fromYear($year))->toBe($element);
})->with(getZodiacDatasetElements());