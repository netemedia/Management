<?php

namespace App\Support;

class Time
{
    /**
     * Displays a human-readable time,
     * based on an int and eventually an offet
     * (formats into : HH:00 or HH:30)
     *
     * @param int $int
     * @param int $offset
     *
     * @return string
     *
     * @example Time::fromInt(1) should return "0:30"
     * @example Time::fromInt(9) should return "4:30"
     * @example Time::fromInt(6, 9) should return "12:00"
     */
    public static function fromInt(int $int, int $offset = 0) : string
    {
        $m = ( 0 === $int % 2 ) ? '00' : '30';
        $h = (int) ( $int / 2 ) + $offset;

        return "$h:$m";
    }
}