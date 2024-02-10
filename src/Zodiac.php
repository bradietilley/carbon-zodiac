<?php

namespace BradieTilley\Zodiac;

use Carbon\Carbon;
use DateTimeInterface;

class Zodiac
{
    /**
     * Boot the carbon macros
     */
    public static function boot(): void
    {
        if (! Carbon::hasMacro('zodiacYear')) {
            Carbon::macro('zodiacYear', function (): Year {
                /** @var Carbon $this */
                /** @phpstan-ignore-next-line */
                return Zodiac::yearFromDate($this);
            });
        }

        if (! Carbon::hasMacro('zodiacElement')) {
            Carbon::macro('zodiacElement', function (): Element {
                /** @var Carbon $this */
                /** @phpstan-ignore-next-line */
                return Zodiac::elementFromDate($this);
            });
        }

        if (! Carbon::hasMacro('zodiacSign')) {
            Carbon::macro('zodiacSign', function (): Sign {
                /** @var Carbon $this */
                /** @phpstan-ignore-next-line */
                return Zodiac::signFromDate($this);
            });
        }
    }

    /**
     * Convert the given date to a zodiac year
     */
    public static function yearFromDate(DateTimeInterface $date): Year
    {
        return Year::fromDate($date);
    }

    /**
     * Convert the given date to a zodiac element
     */
    public static function elementFromDate(DateTimeInterface $date): Element
    {
        return Element::fromDate($date);
    }

    /**
     * Convert the given date to the zodiac sign
     */
    public static function signFromDate(DateTimeInterface $date): Sign
    {
        return Sign::fromDate($date);
    }
}
