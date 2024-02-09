<?php

namespace BradieTilley\Zodiac\Exception;

use BradieTilley\Zodiac\Year;
use Carbon\Carbon;
use DateTimeInterface;
use InvalidArgumentException;

class UnsupportedZodiacDateException extends InvalidArgumentException
{
    public static function exceedsMinimum(Carbon|int $date): self
    {
        return new self(
            sprintf(
                'The zodiac information for `%s` cannot be determined as the date exceeds the minimum of %s',
                $date instanceof DateTimeInterface ? $date->toDateString() : $date,
                Year::MIN_SUPPORTED,
            ),
        );
    }

    public static function tooHigh(Carbon|int $date): self
    {
        return new self(
            sprintf(
                'The zodiac information for `%s` cannot be determined as the date exceeds the maximum of %s',
                $date instanceof DateTimeInterface ? $date->toDateString() : $date,
                Year::MAX_SUPPORTED,
            ),
        );
    }

    public static function unexpected(string $message): self
    {
        return new self($message);
    }
}