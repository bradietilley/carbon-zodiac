<?php

namespace BradieTilley\Zodiac;

use Carbon\CarbonImmutable;

class ZodiacResult
{
    public function __construct(public readonly CarbonImmutable $datetime)
    {
    }
}
