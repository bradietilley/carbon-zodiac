<?php

use BradieTilley\Zodiac\Constants;
use BradieTilley\Zodiac\Year;
use Carbon\Carbon;
use Illuminate\Support\Collection;

test('all years can be queried', function () {
    $file = realpath(__DIR__.'/../data/output.json');

    $actual = Collection::range(1900, 2100)
        ->map(function (int $year) {
            $year = Year::fromYear($year);

            return [
                'year' => $year->toArray(),
                'element' => $year->element()->toArray(),
                'sign' => $year->sign()->toArray(),
            ];
        })
        ->all();

    // // Write changes
    // $json = json_encode($actual, JSON_PRETTY_PRINT);
    // file_put_contents($file, $json);

    $expect = file_get_contents($file);
    $expect = json_decode($expect, true);

    foreach ($actual as $key => $yearActual) {
        $yearExpect = $expect[$key] ?? null;

        expect($yearActual)->toBe($yearExpect);
    }
});

test('compare signs against source', function () {
    $path = realpath(__DIR__.'/../data/source.txt');
    $contents = file_get_contents($path);
    $rows = explode("\n", $contents);
    $rows = collect($rows)
        ->map(function (string $row) {
            preg_match('/(Jan|Feb)[\. ]+(\d+)[, ]+(\d{4}).*year of the ([a-z]+).*$/i', $row, $matches);

            $date = Carbon::createFromFormat('Y-M-d', sprintf('%s-%s-%s', $matches[3], $matches[1], $matches[2]))->startOfDay();
            $expect = strtolower($matches[4]);

            if ($date->year <= Constants::MIN) {
                return;
            }

            $actual = Year::fromDate($date)->sign()->value;

            $expect = [
                'sheep' => 'goat',
                'mouse' => 'rat',
            ][$expect] ?? $expect;

            expect($actual)->toBe($expect, sprintf(
                'Failed asserting that the sign for %s is %s, found %s',
                $date->toDateString(),
                $expect,
                $actual,
            ));
        });
});
