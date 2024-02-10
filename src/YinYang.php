<?php

namespace BradieTilley\Zodiac;

enum YinYang: string
{
    case YIN = 'yin';
    case YANG = 'yang';

    public function label(): string
    {
        return ucfirst($this->value);
    }

    /**
     * Compile this Sign to array form
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'label' => $this->label(),
        ];
    }
}
