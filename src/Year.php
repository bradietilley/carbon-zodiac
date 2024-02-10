<?php

namespace BradieTilley\Zodiac;

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTimeInterface;

class Year
{
    public function __construct(public readonly int $year, public readonly CarbonImmutable $date)
    {
    }

    /**
     * Get the given Zodiac/Chinese Year commencement date from the given Gregorian date
     *
     * @throws UnsupportedZodiacDateException if the date is out of range
     */
    public static function fromDate(DateTimeInterface $date): Year
    {
        NewYears::validate($date);

        $year = (int) $date->format('Y');
        $threshold = NewYears::THRESHOLDS[$year];
        $year = ($date->format('Y-m-d') < $threshold) ? $year - 1 : $year;

        return self::fromYear($year);
    }

    /**
     * Convert a given zodiac year to an Element
     *
     * @throws UnsupportedZodiacDateException
     */
    public static function fromYear(int $year): Year
    {
        NewYears::validate($year);

        return new Year(
            $year,
            CarbonImmutable::parse(NewYears::THRESHOLDS[$year]),
        );
    }

    /**
     * Create a new Year instance from the given date
     *
     * @throws UnsupportedZodiacDateException if the date is out of range
     */
    public static function year(DateTimeInterface $date): int
    {
        return self::fromDate($date)->year;
    }

    /**
     * Get the previous Year
     *
     * @throws UnsupportedZodiacDateException if the date is out of range
     */
    public function prev(): Year
    {
        return self::fromDate(
            Carbon::parse($this->date->setMonth(6)->subYear()),
        );
    }

    /**
     * Get the next Year
     *
     * @throws UnsupportedZodiacDateException if the date is out of range
     */
    public function next(): Year
    {
        return self::fromDate(
            Carbon::parse($this->date->setMonth(6)->addYear()),
        );
    }

    /**
     * Compile this Year to array form
     */
    public function toArray(): array
    {
        return [
            'year' => $this->year,
            'start' => $this->date->toDateString(),
            'end' =>  $this->next()->date->subDay()->toDateString(),
        ];
    }

    public function element(): Element
    {
        return Element::fromYear($this->year);
    }

    public function sign(): Sign
    {
        return Sign::fromYear($this->year);
    }

    public function yinYang(): YinYang
    {
        return ($this->year % 2) === 1 ? YinYang::YIN : YinYang::YANG;
    }
}
