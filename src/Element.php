<?php

namespace BradieTilley\Zodiac;

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use Carbon\Carbon;
use Illuminate\Support\Collection;

enum Element: string
{
    case WOOD = 'wood';
    case FIRE = 'fire';
    case EARTH = 'earth';
    case METAL = 'metal';
    case WATER = 'water';

    /**
     * Get all elements in the order the occur
     *
     * @return Collection<int, Element>
     */
    public static function ordered(): Collection
    {
        return Collection::make([
            self::WOOD,
            self::FIRE,
            self::EARTH,
            self::METAL,
            self::WATER,
        ]);
    }

    /**
     * Convert a given zodiac year to an Element
     *
     * @throws UnsupportedZodiacDateException
     */
    public static function fromYear(int|Year $year): Element
    {
        $year = $year instanceof Year ? $year->year : $year;

        if ($year < Year::MIN_SUPPORTED) {
            throw UnsupportedZodiacDateException::exceedsMinimum($year);
        }

        $steps = [];

        foreach (self::ordered() as $element) {
            $steps[] = $element;
            $steps[] = $element;
        }

        /** @var array<int, Element> $steps */

        // Offset from available start
        $year = $year - Year::MIN_SUPPORTED;

        /**
         * Every 10 year it cycles?
         */
        $year = $year % 10;
        /**
         * @var int $year (0-9)
         */

        if (! isset($steps[$year])) {
            throw UnsupportedZodiacDateException::unexpected('Cannot determine element from year');
        }

        return $steps[$year];
    }

    /**
     * Convert any given date to a Sign
     */
    public static function fromDate(Carbon $date): Element
    {
        return self::fromYear(Year::fromDate($date));
    }

    /**
     * Get the human readable English label of this Element
     */
    public function label(): string
    {
        return ucfirst($this->value);
    }

    /**
     * Compile this Element to array form
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'label' => $this->label(),
        ];
    }
}
