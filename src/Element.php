<?php

namespace BradieTilley\Zodiac;

use Carbon\Carbon;
use Illuminate\Support\Collection;

enum Element: string
{
    case WOOD = 'wood';
    case FIRE = 'fire';
    case EARTH = 'earth';
    case METAL = 'metal';
    case WATER = 'water';

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
     */
    public static function fromYear(int $year): Element
    {
        if ($year < 1924) {
            throw new \Exception('Unsupported date');
        }

        $steps = [];

        foreach (self::ordered() as $element) {
            $steps[] = $element;
            $steps[] = $element;
        }

        // Offset from available start
        $year = $year - 1924;

        /**
         * Every 10 year it cycles?
         */
        $year = $year % 10;
        /**
         * @var int (0-9) $year
         */

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
}
