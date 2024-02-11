<?php

namespace BradieTilley\Zodiac\Exception;

use BradieTilley\Zodiac\Constants;
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
                Constants::MIN,
            ),
        );
    }

    public static function exceedsMaximum(Carbon|int $date): self
    {
        return new self(
            sprintf(
                'The zodiac information for `%s` cannot be determined as the date exceeds the maximum of %s',
                $date instanceof DateTimeInterface ? $date->toDateString() : $date,
                Constants::MAX,
            ),
        );
    }

    public static function unexpected(string $message): self
    {
        return new self($message);
    }
}
