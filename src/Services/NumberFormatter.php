<?php
/**
 * Created by PhpStorm.
 * User: vitalijus
 * Date: 18.5.20
 * Time: 12.52
 */

namespace App\Services;


class NumberFormatter
{

    public function format($number)
    {
        if ($number >= 999500 or $number <= -999500) {
            $rounded = round($number, -4);
            $tostring = number_format($rounded, 2, '.', '.');
            $shorten = mb_substr($tostring, 0, -8) . 'M';

            return $shorten;

        }

        if (($number < 999500 and $number >= 99950) or ($number > -999500 and $number <= -99950)) {
            $rounded = round($number, -3);
            $tostring = number_format($rounded, 2, '', '');
            $shorten = mb_substr($tostring, 0, -5) . 'K';

            return $shorten;

        }

        if (($number < 99950 and $number >= 1000) or ($number > -99950 and $number <= -1000)) {
            $rounded = round($number, 2);
            $tostring = number_format($rounded, 0, '', ' ');
            $shorten = mb_substr($tostring, 0);

            return $shorten;

        }

        if (($number < 1000 and $number >= 0) or ($number > -1000 and $number < 0)) {


            $rounded = round($number, 2);


            if ($rounded === 1000.00 or $rounded === -1000.00) {
                $tostring = number_format($rounded, 0, '.', ' ');
                $shorten = mb_substr($tostring, 0);
            } else {
                $tostring = number_format($rounded, 2, '.', ' ');
                $shorten = mb_substr($tostring, 0);
            }

            return $shorten;

        }


        return $number;
    }


}