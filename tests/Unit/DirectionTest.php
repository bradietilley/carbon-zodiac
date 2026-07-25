<?php

use BradieTilley\Zodiac\CardinalDirection;
use BradieTilley\Zodiac\Direction;
use BradieTilley\Zodiac\Sign;

test('directions map to cardinal directions', function (Direction $direction, CardinalDirection $cardinal) {
    expect($direction->cardinalDirection())->toBe($cardinal)
        ->and($direction->quadrant())->toBe($cardinal->label());
})->with([
    [Direction::NORTH, CardinalDirection::NORTH],
    [Direction::NORTHNORTHEAST, CardinalDirection::NORTH],
    [Direction::NORTHNORTHWEST, CardinalDirection::NORTH],
    [Direction::EASTNORTHEAST, CardinalDirection::EAST],
    [Direction::EAST, CardinalDirection::EAST],
    [Direction::EASTSOUTHEAST, CardinalDirection::EAST],
    [Direction::SOUTHSOUTHEAST, CardinalDirection::SOUTH],
    [Direction::SOUTH, CardinalDirection::SOUTH],
    [Direction::SOUTHSOUTHWEST, CardinalDirection::SOUTH],
    [Direction::WESTSOUTHWEST, CardinalDirection::WEST],
    [Direction::WEST, CardinalDirection::WEST],
    [Direction::WESTNORTHWEST, CardinalDirection::WEST],
]);

test('signs expose cardinal direction via direction enum', function () {
    expect(Sign::ROOSTER->direction()->cardinalDirection())->toBe(CardinalDirection::WEST)
        ->and(Sign::DOG->direction()->cardinalDirection())->toBe(CardinalDirection::WEST)
        ->and(Sign::DRAGON->direction()->cardinalDirection())->toBe(CardinalDirection::EAST);
});

test('direction toArray includes cardinal_direction', function () {
    expect(Direction::WESTNORTHWEST->toArray())->toBe([
        'value' => 'WNW',
        'label' => 'West-Northwest',
        'degrees' => 300,
        'quadrant' => 'West',
        'cardinal_direction' => [
            'value' => 'west',
            'label' => 'West',
        ],
    ]);
});
