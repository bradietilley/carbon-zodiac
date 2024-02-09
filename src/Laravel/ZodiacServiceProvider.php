<?php

namespace BradieTilley\Zodiac\Laravel;

use BradieTilley\Zodiac\Zodiac;
use Illuminate\Support\ServiceProvider;

class ZodiacServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Zodiac::boot();
    }
}
