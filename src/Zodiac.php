<?php

namespace BradieTilley\Zodiac;

use Carbon\Carbon;

class Zodiac
{
    public static function boot(): void
    {
        if (! Carbon::hasMacro('zodiacYear')) {
            Carbon::macro('zodiacYear', function (): int {
                /** @var Carbon $this */
                return Year::fromDate($this->copy());
            });
        }

        if (! Carbon::hasMacro('zodiacElement')) {
            Carbon::macro('zodiacElement', function (): Element {
                /** @var Carbon $this */
                return Element::fromYear($this->copy()->zodiacYear());
            });
        }

        if (! Carbon::hasMacro('zodiacSign')) {
            Carbon::macro('zodiacSign', function (): Sign {
                /** @var Carbon $this */
                return Sign::fromYear($this->copy()->zodiacYear());
            });
        }
    }
}