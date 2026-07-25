<?php

namespace BradieTilley\Zodiac;

enum CardinalDirection: string
{
    case NORTH = 'north';
    case EAST = 'east';
    case SOUTH = 'south';
    case WEST = 'west';

    public function label(): string
    {
        return ucfirst($this->value);
    }

    /**
     * @return array{value: string, label: string}
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'label' => $this->label(),
        ];
    }
}
