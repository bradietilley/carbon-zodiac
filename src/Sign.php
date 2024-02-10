<?php

namespace BradieTilley\Zodiac;

use BradieTilley\Zodiac\Exception\UnsupportedZodiacDateException;
use DateTimeInterface;
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
    case GOAT = 'goat';
    case MONKEY = 'monkey';
    case ROOSTER = 'rooster';
    case DOG = 'dog';
    case PIG = 'pig';

    /**
     * Get all signs in the order the occur
     *
     * @return Collection<int, Sign>
     */
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
            self::GOAT,
            self::MONKEY,
            self::ROOSTER,
            self::DOG,
            self::PIG,
        ]);
    }

    /**
     * Convert a given zodiac year to a Sign
     */
    public static function fromYear(int|Year $year): Sign
    {
        $year = $year instanceof Year ? $year->year : $year;

        NewYears::validate($year);

        $steps = self::ordered()->all();

        // Offset from available start
        $yearRelative = $year - NewYears::MIN;

        /**
         * Every 12 year it cycles
         */
        $yearMod = $yearRelative % 12;
        /**
         * @var int $year (0-11)
         */

        if (! isset($steps[$yearMod])) {
            throw UnsupportedZodiacDateException::unexpected('Cannot determine sign from year');
        }

        return $steps[$yearMod];
    }

    /**
     * Convert any given date to a Sign
     */
    public static function fromDate(DateTimeInterface $date): Sign
    {
        return Year::fromDate($date)->sign();
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
            self::GOAT => 'Goat',
            self::MONKEY => 'Monkey',
            self::ROOSTER => 'Rooster',
            self::DOG => 'Dog',
            self::PIG => 'Pig',
        };
    }

    /**
     * Get the sign's YinYang state
     */
    public function yinYang(): YinYang
    {
        return match ($this) {
            self::RAT => YinYang::YANG,
            self::OX => YinYang::YIN,
            self::TIGER => YinYang::YANG,
            self::RABBIT => YinYang::YIN,
            self::DRAGON => YinYang::YANG,
            self::SNAKE => YinYang::YIN,
            self::HORSE => YinYang::YANG,
            self::GOAT => YinYang::YIN,
            self::MONKEY => YinYang::YANG,
            self::ROOSTER => YinYang::YIN,
            self::DOG => YinYang::YANG,
            self::PIG => YinYang::YIN,
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
            self::GOAT => 'South',
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
            self::GOAT => 'Late Summer',
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
            self::GOAT => Element::EARTH,
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
            self::GOAT => 4,
            self::MONKEY => 1,
            self::ROOSTER => 2,
            self::DOG => 3,
            self::PIG => 4,
        };
    }

    public function symbolPreferTraditional(): string
    {
        return match ($this) {
            self::RAT => '鼠',
            self::OX => '牛',
            self::TIGER => '虎',
            self::RABBIT => '兔',
            self::DRAGON => '龍',
            self::SNAKE => '蛇',
            self::HORSE => '馬',
            self::GOAT => '羊',
            self::MONKEY => '猴',
            self::ROOSTER => '雞',
            self::DOG => '狗',
            self::PIG => '豬',
        };
    }

    public function symbolPreferSimplified(): string
    {
        return match ($this) {
            self::RAT => '鼠',
            self::OX => '牛',
            self::TIGER => '虎',
            self::RABBIT => '兔',
            self::DRAGON => '龙',
            self::SNAKE => '蛇',
            self::HORSE => '马',
            self::GOAT => '羊',
            self::MONKEY => '猴',
            self::ROOSTER => '鸡',
            self::DOG => '狗',
            self::PIG => '猪',
        };
    }

    /**
     * Compile this Sign to array form
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'label' => $this->label(),
            'data' => [
                'yin_yang' => $this->yinYang()->toArray(),
                'direction' => $this->direction(),
                'season' => $this->season(),
                'fixed_element' => $this->fixedElement()->toArray(),
                'trine' => $this->trine(),
                'symbols' => [
                    'traditional' => $this->symbolPreferTraditional(),
                    'simplified' => $this->symbolPreferSimplified(),
                ],
            ],
        ];
    }
}
