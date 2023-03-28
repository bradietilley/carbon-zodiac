<?php

namespace BradieTilley\Zodiac;

use Carbon\Carbon;
use Illuminate\Support\Collection;

enum Sign: string
{
    case RAT = 'rat';
    case OX = 'ox';
    case TIGER = 'tiger';
    case RABBIT = 'rabbit';
    case DRAGON = 'dragon';
    case SNAKE = 'snake';
    case HORSE = 'horse';
    case SHEEP = 'sheep';
    case MONKEY = 'monkey';
    case ROOSTER = 'rooster';
    case DOG = 'dog';
    case PIG = 'pig';

    public static function ordered(): Collection
    {
        return Collection::make([
            self::RAT,
            self::OX,
            self::TIGER,
            self::RABBIT,
            self::DRAGON,
            self::SNAKE,
            self::HORSE,
            self::SHEEP,
            self::MONKEY,
            self::ROOSTER,
            self::DOG,
            self::PIG,
        ]);
    }

    /**
     * Convert a given zodiac year to a Sign
     */
    public static function fromYear(int $year): Sign
    {
        if ($year < 1924) {
            throw new \Exception('Unsupported date');
        }

        $steps = self::ordered()->all();

        // Offset from available start
        $year = $year - 1924;

        /**
         * Every 12 year it cycles
         */
        $year = $year % 12;
        /**
         * @var int (0-11) $year
         */

        return $steps[$year];
    }

    /**
     * Convert any given date to a Sign
     */
    public static function fromDate(Carbon $date): Sign
    {
        return self::fromYear(Year::fromDate($date));
    }

    /**
     * Get the human readable English label for this sign
     */
    public function label(): string
    {
        return match ($this) {
            self::RAT => 'Rat',
            self::OX => 'Ox',
            self::TIGER => 'Tiger',
            self::RABBIT => 'Rabbit',
            self::DRAGON => 'Dragon',
            self::SNAKE => 'Snake',
            self::HORSE => 'Horse',
            self::SHEEP => 'Sheep',
            self::MONKEY => 'Monkey',
            self::ROOSTER => 'Rooster',
            self::DOG => 'Dog',
            self::PIG => 'Pig',
        };
    }

    /**
     * Get the sign's Yin or Yang state 
     */
    public function yinYang(): string
    {
        return match ($this) {
            self::RAT => 'Yang',
            self::OX => 'Yin',
            self::TIGER => 'Yang',
            self::RABBIT => 'Yin',
            self::DRAGON => 'Yang',
            self::SNAKE => 'Yin',
            self::HORSE => 'Yang',
            self::SHEEP => 'Yin',
            self::MONKEY => 'Yang',
            self::ROOSTER => 'Yin',
            self::DOG => 'Yang',
            self::PIG => 'Yin',
        };
    }

    /**
     * Get the sign's direction
     */
    public function direction(): string
    {
        return match ($this) {
            self::RAT => 'North',
            self::OX => 'North',
            self::TIGER => 'East',
            self::RABBIT => 'East',
            self::DRAGON => 'East',
            self::SNAKE => 'South',
            self::HORSE => 'South',
            self::SHEEP => 'South',
            self::MONKEY => 'West',
            self::ROOSTER => 'West',
            self::DOG => 'West',
            self::PIG => 'North',
        };
    }

    /**
     * Get the sign's season
     */
    public function season(): string
    {
        return match ($this) {
            self::RAT => 'Mid-Winter',
            self::OX => 'Late Winter',
            self::TIGER => 'Early Spring',
            self::RABBIT => 'Mid-Spring',
            self::DRAGON => 'Late Spring',
            self::SNAKE => 'Early Summer',
            self::HORSE => 'Mid-Summer',
            self::SHEEP => 'Late Summer',
            self::MONKEY => 'Early Autumn',
            self::ROOSTER => 'Mid-Autumn',
            self::DOG => 'Late Autumn',
            self::PIG => 'Early Winter',
        };
    }

    /**
     * Get the sign's fixed element
     */
    public function fixedElement(): Element
    {
        return match ($this) {
            self::RAT => Element::WATER,
            self::OX => Element::EARTH,
            self::TIGER => Element::WOOD,
            self::RABBIT => Element::WOOD,
            self::DRAGON => Element::EARTH,
            self::SNAKE => Element::FIRE,
            self::HORSE => Element::FIRE,
            self::SHEEP => Element::EARTH,
            self::MONKEY => Element::METAL,
            self::ROOSTER => Element::METAL,
            self::DOG => Element::EARTH,
            self::PIG => Element::WATER,
        };
    }

    /**
     * Get the sign's trine
     */
    public function trine(): int
    {
        return match ($this) {
            self::RAT => 1,
            self::OX => 2,
            self::TIGER => 3,
            self::RABBIT => 4,
            self::DRAGON => 1,
            self::SNAKE => 2,
            self::HORSE => 3,
            self::SHEEP => 4,
            self::MONKEY => 1,
            self::ROOSTER => 2,
            self::DOG => 3,
            self::PIG => 4,
        };
    }
}