<?php

namespace BradieTilley\Zodiac;

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use DateTimeInterface;
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
     * @return array<int, Element>
     */
    public static function sequence(): array
    {
        return [
            self::EARTH,
            self::METAL,
            self::WATER,
            self::WOOD,
            self::FIRE,
        ];
    }

    /**
     * Get all elements in the order the occur
     *
     * @return Collection<int, Element>
     */
    public static function ordered(): Collection
    {
        return Collection::make(self::sequence());
    }

    /**
     * Get an array of Elements where the key represents
     * the year's ending number. E.g. 1997 -> 7 -> the 8th -> FIRE
     *
     * @return array<int, Element>
     */
    public static function index(): array
    {
        return [
            self::METAL,
            self::METAL,
            self::WATER,
            self::WATER,
            self::WOOD,
            self::WOOD,
            self::FIRE,
            self::FIRE,
            self::EARTH,
            self::EARTH,
        ];
    }

    /**
     * Convert a given zodiac year to an Element
     *
     * @throws UnsupportedZodiacDateException
     */
    public static function fromYear(int|Year $year): Element
    {
        $year = $year instanceof Year ? $year->year : $year;

        Constants::validate($year);

        /**
         * @var int $index (0-9)
         */
        $index = $year % 10;

        return self::index()[$index];
    }

    /**
     * Convert any given date to a Sign
     */
    public static function fromDate(DateTimeInterface $date): Element
    {
        return Year::fromDate($date)->element();
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
