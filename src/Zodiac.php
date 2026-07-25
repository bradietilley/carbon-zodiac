<?php

namespace BradieTilley\Zodiac;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTimeInterface;

class Zodiac
{
    /**
     * Boot the carbon macros on Carbon and CarbonImmutable
     */
    public static function boot(): void
    {
        self::registerMacros(Carbon::class);
        self::registerMacros(CarbonImmutable::class);
    }

    /**
     * @param class-string<Carbon>|class-string<CarbonImmutable> $class
     */
    private static function registerMacros(string $class): void
    {
        if (! $class::hasMacro('zodiacYear')) {
            $class::macro('zodiacYear', function (): Year {
                $context = $this;
                /** @var Carbon|CarbonImmutable $context */

                return Zodiac::yearFromDate($context);
            });
        }

        if (! $class::hasMacro('zodiacElement')) {
            $class::macro('zodiacElement', function (): Element {
                $context = $this;
                /** @var Carbon|CarbonImmutable $context */

                return Zodiac::elementFromDate($context);
            });
        }

        if (! $class::hasMacro('zodiacSign')) {
            $class::macro('zodiacSign', function (): Sign {
                $context = $this;
                /** @var Carbon|CarbonImmutable $context */

                return Zodiac::signFromDate($context);
            });
        }

        if (! $class::hasMacro('zodiac')) {
            $class::macro('zodiac', function (): ZodiacResult {
                $context = $this;
                /** @var Carbon|CarbonImmutable $context */

                return Zodiac::fromDate($context);
            });
        }
    }

    /**
     * Convert the given date to a full zodiac result
     */
    public static function fromDate(DateTimeInterface $date): ZodiacResult
    {
        return ZodiacResult::fromDate($date);
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
