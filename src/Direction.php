<?php

namespace BradieTilley\Zodiac;

enum Direction: string
{
    case NORTH = 'N';
    case NORTHNORTHEAST = 'NNE';
    case EASTNORTHEAST = 'ENE';
    case EAST = 'E';
    case EASTSOUTHEAST = 'ESE';
    case SOUTHSOUTHEAST = 'SSE';
    case SOUTH = 'S';
    case SOUTHSOUTHWEST = 'SSW';
    case WESTSOUTHWEST = 'WSW';
    case WEST = 'W';
    case WESTNORTHWEST = 'WNW';
    case NORTHNORTHWEST = 'NNW';

    public function label(): string
    {
        return match ($this) {
            self::NORTH => 'North',
            self::NORTHNORTHEAST => 'North-Northeast',
            self::EASTNORTHEAST => 'East-Northeast',
            self::EAST => 'East',
            self::EASTSOUTHEAST => 'East-Southeast',
            self::SOUTHSOUTHEAST => 'South-Southeast',
            self::SOUTH => 'South',
            self::SOUTHSOUTHWEST => 'South-Southwest',
            self::WESTSOUTHWEST => 'West-Southwest',
            self::WEST => 'West',
            self::WESTNORTHWEST => 'West-Northwest',
            self::NORTHNORTHWEST => 'North-Northwest',
        };
    }

    public function degrees(): int
    {
        return match ($this) {
            self::NORTH => 0,
            self::NORTHNORTHEAST => 30,
            self::EASTNORTHEAST => 60,
            self::EAST => 90,
            self::EASTSOUTHEAST => 120,
            self::SOUTHSOUTHEAST => 150,
            self::SOUTH => 180,
            self::SOUTHSOUTHWEST => 210,
            self::WESTSOUTHWEST => 240,
            self::WEST => 270,
            self::WESTNORTHWEST => 300,
            self::NORTHNORTHWEST => 330,
        };
    }

    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'label' => $this->label(),
            'degrees' => $this->degrees(),
        ];
    }
}
