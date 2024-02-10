<?php

use BradieTilley\Zodiac\Element;
use BradieTilley\Zodiac\Sign;

function getZodiacDatasetYears(): array
{
    return [
        '1924-02-04 is 1923' => [ '1924-02-04', 1923, ],
        '1924-02-05 is 1924' => [ '1924-02-05', 1924, ],
        '1924-02-06 is 1924' => [ '1924-02-06', 1924, ],
        '1924-12-31 is 1924' => [ '1924-12-31', 1924, ],
        '1925-01-01 is 1924' => [ '1925-01-01', 1924, ],
        '1925-01-23 is 1924' => [ '1925-01-23', 1924, ],
        '1925-01-24 is 1925' => [ '1925-01-24', 1925, ],
        '1925-01-25 is 1925' => [ '1925-01-25', 1925, ],
        '1926-02-12 is 1925' => [ '1926-02-12', 1925, ],
        '1926-02-13 is 1926' => [ '1926-02-13', 1926, ],
        '1926-03-05 is 1926' => [ '1926-03-05', 1926, ],
        '1927-03-05 is 1927' => [ '1927-03-05', 1927, ],
        '1928-03-05 is 1928' => [ '1928-03-05', 1928, ],
        '1929-03-05 is 1929' => [ '1929-03-05', 1929, ],
    ];
}

function getZodiacDatasetElements(): array
{
    return [
        '1924 yields Wood' => [ 1924, Element::WOOD->value, ],
        '1925 yields Wood' => [ 1925, Element::WOOD->value, ],
        '1926 yields Fire' => [ 1926, Element::FIRE->value, ],
        '1927 yields Fire' => [ 1927, Element::FIRE->value, ],
        '1928 yields Earth' => [ 1928, Element::EARTH->value, ],
        '1929 yields Earth' => [ 1929, Element::EARTH->value, ],
        '1930 yields Metal' => [ 1930, Element::METAL->value, ],
        '1931 yields Metal' => [ 1931, Element::METAL->value, ],
        '1932 yields Water' => [ 1932, Element::WATER->value, ],
        '1933 yields Water' => [ 1933, Element::WATER->value, ],

        '1934 yields Wood' => [ 1934, Element::WOOD->value, ],
        '1935 yields Wood' => [ 1935, Element::WOOD->value, ],
        '1936 yields Fire' => [ 1936, Element::FIRE->value, ],
        '1937 yields Fire' => [ 1937, Element::FIRE->value, ],
        '1938 yields Earth' => [ 1938, Element::EARTH->value, ],
        '1939 yields Earth' => [ 1939, Element::EARTH->value, ],
        '1940 yields Metal' => [ 1940, Element::METAL->value, ],
        '1941 yields Metal' => [ 1941, Element::METAL->value, ],
        '1942 yields Water' => [ 1942, Element::WATER->value, ],
        '1943 yields Water' => [ 1943, Element::WATER->value, ],

        '2024 yields Wood' => [ 1934, Element::WOOD->value, ],
        '2025 yields Wood' => [ 1935, Element::WOOD->value, ],
        '2026 yields Fire' => [ 1936, Element::FIRE->value, ],
        '2027 yields Fire' => [ 1937, Element::FIRE->value, ],
        '2028 yields Earth' => [ 1938, Element::EARTH->value, ],
        '2029 yields Earth' => [ 1939, Element::EARTH->value, ],
        '2030 yields Metal' => [ 1940, Element::METAL->value, ],
        '2031 yields Metal' => [ 1941, Element::METAL->value, ],
        '2032 yields Water' => [ 1942, Element::WATER->value, ],
        '2033 yields Water' => [ 1943, Element::WATER->value, ],
    ];
}

function getZodiacDatasetSigns(): array
{
    return [
        '1924 yields Rat' => [ 1924, Sign::RAT->value, ],
        '1925 yields Ox' => [ 1925, Sign::OX->value, ],
        '1926 yields Tiger' => [ 1926, Sign::TIGER->value, ],
        '1927 yields Rabbit' => [ 1927, Sign::RABBIT->value, ],
        '1928 yields Dragon' => [ 1928, Sign::DRAGON->value, ],
        '1929 yields Snake' => [ 1929, Sign::SNAKE->value, ],
        '1930 yields Horse' => [ 1930, Sign::HORSE->value, ],
        '1931 yields Goat' => [ 1931, Sign::GOAT->value, ],
        '1932 yields Monkey' => [ 1932, Sign::MONKEY->value, ],
        '1933 yields Rooster' => [ 1933, Sign::ROOSTER->value, ],
        '1934 yields Dog' => [ 1934, Sign::DOG->value, ],
        '1935 yields Pig' => [ 1935, Sign::PIG->value, ],

        '1936 yields Rat' => [ 1936, Sign::RAT->value, ],
        '1937 yields Ox' => [ 1937, Sign::OX->value, ],
        '1938 yields Tiger' => [ 1938, Sign::TIGER->value, ],
        '1939 yields Rabbit' => [ 1939, Sign::RABBIT->value, ],
        '1940 yields Dragon' => [ 1940, Sign::DRAGON->value, ],
        '1941 yields Snake' => [ 1941, Sign::SNAKE->value, ],
        '1942 yields Horse' => [ 1942, Sign::HORSE->value, ],
        '1943 yields Goat' => [ 1943, Sign::GOAT->value, ],
        '1944 yields Monkey' => [ 1944, Sign::MONKEY->value, ],
        '1945 yields Rooster' => [ 1945, Sign::ROOSTER->value, ],
        '1946 yields Dog' => [ 1946, Sign::DOG->value, ],
        '1947 yields Pig' => [ 1947, Sign::PIG->value, ],

        '2020 yields Rat' => [ 1936, Sign::RAT->value, ],
        '2021 yields Ox' => [ 1937, Sign::OX->value, ],
        '2022 yields Tiger' => [ 1938, Sign::TIGER->value, ],
        '2023 yields Rabbit' => [ 1939, Sign::RABBIT->value, ],
        '2024 yields Dragon' => [ 1940, Sign::DRAGON->value, ],
        '2025 yields Snake' => [ 1941, Sign::SNAKE->value, ],
        '2026 yields Horse' => [ 1942, Sign::HORSE->value, ],
        '2027 yields Goat' => [ 1943, Sign::GOAT->value, ],
        '2028 yields Monkey' => [ 1944, Sign::MONKEY->value, ],
        '2029 yields Rooster' => [ 1945, Sign::ROOSTER->value, ],
        '2030 yields Dog' => [ 1946, Sign::DOG->value, ],
        '2031 yields Pig' => [ 1947, Sign::PIG->value, ],
    ];
}
