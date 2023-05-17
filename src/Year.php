<?php

namespace BradieTilley\Zodiac;

use Carbon\Carbon;
use InvalidArgumentException;

class Year
{
    /**
     * Date of Chinese New Year(s)
     */
    public const THRESHOLDS = [
        1901 => '1901-02-07', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1901e.pdf
        1902 => '1902-02-08', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1902e.pdf
        1903 => '1903-01-29', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1903e.pdf
        1904 => '1904-02-16', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1904e.pdf
        1905 => '1905-02-04', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1905e.pdf
        1906 => '1906-01-25', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1906e.pdf
        1907 => '1907-02-13', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1907e.pdf
        1908 => '1908-02-02', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1908e.pdf
        1909 => '1909-01-22', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1909e.pdf

        1910 => '1910-02-10', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1910e.pdf
        1911 => '1911-01-30', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1911e.pdf
        1912 => '1912-02-18', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1912e.pdf
        1913 => '1913-02-06', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1913e.pdf
        1914 => '1914-01-26', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1914e.pdf
        1915 => '1915-02-14', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1915e.pdf
        1916 => '1916-02-03', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1916e.pdf
        1917 => '1917-01-23', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1917e.pdf
        1918 => '1918-02-11', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1918e.pdf
        1919 => '1919-02-01', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1919e.pdf

        1920 => '1920-02-20', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1920e.pdf
        1921 => '1921-02-08', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1921e.pdf
        1922 => '1922-01-28', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1922e.pdf
        1923 => '1923-02-16', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1923e.pdf
        1924 => '1924-02-05', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1924e.pdf
        1925 => '1925-01-24', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1925e.pdf
        1926 => '1926-02-13', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1926e.pdf
        1927 => '1927-02-02', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1927e.pdf
        1928 => '1928-01-23', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1928e.pdf
        1929 => '1929-02-10', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1929e.pdf

        1930 => '1930-01-30', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1930e.pdf
        1931 => '1931-02-17', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1931e.pdf
        1932 => '1932-02-06', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1932e.pdf
        1933 => '1933-01-26', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1933e.pdf
        1934 => '1934-02-14', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1934e.pdf
        1935 => '1935-02-04', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1935e.pdf
        1936 => '1936-01-24', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1936e.pdf
        1937 => '1937-02-11', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1937e.pdf
        1938 => '1938-01-31', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1938e.pdf
        1939 => '1939-02-19', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1939e.pdf

        1940 => '1940-02-08', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1940e.pdf
        1941 => '1941-01-27', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1941e.pdf
        1942 => '1942-02-15', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1942e.pdf
        1943 => '1943-02-05', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1943e.pdf
        1944 => '1944-01-25', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1944e.pdf
        1945 => '1945-02-13', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1945e.pdf
        1946 => '1946-02-02', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1946e.pdf
        1947 => '1947-01-22', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1947e.pdf
        1948 => '1948-02-10', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1948e.pdf
        1949 => '1949-01-29', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1949e.pdf

        1950 => '1950-02-17', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1950e.pdf
        1951 => '1951-02-06', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1951e.pdf
        1952 => '1952-01-27', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1952e.pdf
        1953 => '1953-02-14', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1953e.pdf
        1954 => '1954-02-03', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1954e.pdf
        1955 => '1955-01-24', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1955e.pdf
        1956 => '1956-02-12', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1956e.pdf
        1957 => '1957-01-31', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1957e.pdf
        1958 => '1958-02-18', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1958e.pdf
        1959 => '1959-02-08', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1959e.pdf

        1960 => '1960-01-28', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1960e.pdf
        1961 => '1961-02-15', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1961e.pdf
        1962 => '1962-02-05', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1962e.pdf
        1963 => '1963-01-25', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1963e.pdf
        1964 => '1964-02-13', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1964e.pdf
        1965 => '1965-02-02', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1965e.pdf
        1966 => '1966-01-21', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1966e.pdf
        1967 => '1967-02-09', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1967e.pdf
        1968 => '1968-01-30', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1968e.pdf
        1969 => '1969-02-17', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1969e.pdf

        1970 => '1970-02-06', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1970e.pdf
        1971 => '1971-01-27', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1971e.pdf
        1972 => '1972-02-15', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1972e.pdf
        1973 => '1973-02-03', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1973e.pdf
        1974 => '1974-01-23', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1974e.pdf
        1975 => '1975-02-11', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1975e.pdf
        1976 => '1976-01-31', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1976e.pdf
        1977 => '1977-02-18', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1977e.pdf
        1978 => '1978-02-07', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1978e.pdf
        1979 => '1979-01-28', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1979e.pdf

        1980 => '1980-02-16', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1980e.pdf
        1981 => '1981-02-05', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1981e.pdf
        1982 => '1982-01-25', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1982e.pdf
        1983 => '1983-02-13', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1983e.pdf
        1984 => '1984-02-02', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1984e.pdf
        1985 => '1985-02-20', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1985e.pdf
        1986 => '1986-02-09', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1986e.pdf
        1987 => '1987-01-29', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1987e.pdf
        1988 => '1988-02-17', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1988e.pdf
        1989 => '1989-02-06', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1989e.pdf

        1990 => '1990-01-27', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1990e.pdf
        1991 => '1991-02-15', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1991e.pdf
        1992 => '1992-02-04', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1992e.pdf
        1993 => '1993-01-23', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1993e.pdf
        1994 => '1994-02-10', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1994e.pdf
        1995 => '1995-01-31', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1995e.pdf
        1996 => '1996-02-19', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1996e.pdf
        1997 => '1997-02-07', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1997e.pdf
        1998 => '1998-01-28', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1998e.pdf
        1999 => '1999-02-16', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/1999e.pdf

        2000 => '2000-02-05', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2000e.pdf
        2001 => '2001-01-24', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2001e.pdf
        2002 => '2002-02-12', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2002e.pdf
        2003 => '2003-02-01', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2003e.pdf
        2004 => '2004-01-22', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2004e.pdf
        2005 => '2005-02-09', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2005e.pdf
        2006 => '2006-01-29', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2006e.pdf
        2007 => '2007-02-18', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2007e.pdf
        2008 => '2008-02-07', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2008e.pdf
        2009 => '2009-01-26', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2009e.pdf

        2010 => '2010-02-14', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2010e.pdf
        2011 => '2011-02-03', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2011e.pdf
        2012 => '2012-01-23', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2012e.pdf
        2013 => '2013-02-10', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2013e.pdf
        2014 => '2014-01-31', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2014e.pdf
        2015 => '2015-02-19', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2015e.pdf
        2016 => '2016-02-08', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2016e.pdf
        2017 => '2017-01-28', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2017e.pdf
        2018 => '2018-02-16', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2018e.pdf
        2019 => '2019-02-05', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2019e.pdf

        2020 => '2020-01-25', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2020e.pdf
        2021 => '2021-02-12', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2021e.pdf
        2022 => '2022-02-01', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2022e.pdf
        2023 => '2023-01-22', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2023e.pdf
        2024 => '2024-02-10', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2024e.pdf
        2025 => '2025-01-29', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2025e.pdf
        2026 => '2026-02-17', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2026e.pdf
        2027 => '2027-02-06', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2027e.pdf
        2028 => '2028-01-26', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2028e.pdf
        2029 => '2029-02-13', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2029e.pdf

        2030 => '2030-02-03', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2030e.pdf
        2031 => '2031-01-23', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2031e.pdf
        2032 => '2032-02-11', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2032e.pdf
        2033 => '2033-01-31', // Source: https://www.hko.gov.hk/en/gts/time/calendar/pdf/files/2033e.pdf
    ];

    public const MIN_SUPPORTED = 1901;

    public const MAX_SUPPORTED = 2033;

    /**
     * Get the given Chinese Year from the given Gregorian date
     */
    public static function fromDate(Carbon $date): int
    {
        $dateYmd = $date->toDateString();

        $min = self::THRESHOLDS[self::MIN_SUPPORTED];
        $max = self::THRESHOLDS[self::MAX_SUPPORTED];

        if ($date < $min) {
            throw new InvalidArgumentException(
                sprintf(
                    'Minimum supported zodiac date is %s',
                    $min,
                ),
            );
        }

        if ($date > $max) {
            throw new InvalidArgumentException(
                sprintf(
                    'Maximum supported zodiac date is %s',
                    $max,
                ),
            );
        }

        $previous = 1919;

        foreach (self::THRESHOLDS as $year => $match) {
            if ($dateYmd < $match) {
                return $previous;
            }

            $previous = $year;
        }

        if ($date > $max) {
            throw new InvalidArgumentException(
                'Unsupported date',
            );
        }
    }
}
