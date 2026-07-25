<?php

namespace BradieTilley\Zodiac;

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use Carbon\CarbonImmutable;
use DateTimeInterface;

class ZodiacResult
{
    public function __construct(
        public readonly CarbonImmutable $datetime,
        public readonly Year $year,
        public readonly Sign $sign,
        public readonly Element $element,
    ) {
    }

    /**
     * Resolve zodiac year, sign, and element for the given date
     *
     * @throws UnsupportedZodiacDateException if the date is out of range
     */
    public static function fromDate(DateTimeInterface $date): self
    {
        $datetime = CarbonImmutable::instance($date);
        $year = Year::fromDate($datetime);

        return new self(
            $datetime,
            $year,
            $year->sign(),
            $year->element(),
        );
    }

    /**
     * Compile this result to array form
     *
     * @return array{
     *     datetime: string,
     *     year: array{year: int, start: string, end: string, yin_yang: array{value: string, label: string, color: string}},
     *     sign: array{
     *         value: string,
     *         label: string,
     *         data: array{
     *             yin_yang: array{value: string, label: string, color: string},
     *             direction: array{value: string, label: string, degrees: int, quadrant: string, cardinal_direction: array{value: string, label: string}},
     *             season: string,
     *             fixed_element: array{value: string, label: string},
     *             trine: int,
     *             symbols: array{traditional: string, simplified: string}
     *         }
     *     },
     *     element: array{value: string, label: string}
     * }
     *
     * @throws UnsupportedZodiacDateException if the year's end date cannot be determined
     */
    public function toArray(): array
    {
        return [
            'datetime' => $this->datetime->toDateTimeString(),
            'year' => $this->year->toArray(),
            'sign' => $this->sign->toArray(),
            'element' => $this->element->toArray(),
        ];
    }
}
