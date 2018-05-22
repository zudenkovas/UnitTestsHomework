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
        $sign = $number < 0 ? '-' : '';
        $absNumber = abs($number);
        if ($absNumber >= 999500 ) {
            return $sign . sprintf('%.2fM', round($absNumber / 1000000, 2));

        }

        if ($absNumber < 999500 and $absNumber >= 99950) {
            return $sign . sprintf('%.0fK', round($absNumber / 1000, 0));

        }

        if ($absNumber < 99950 and $absNumber >= 1000) {
            return $sign . mb_substr(number_format($absNumber, 0, '', ' '), 0);

        }

        if ($absNumber < 1000 and $absNumber >= 0) {


            $rounded = round($absNumber, 2);


            if ($rounded === 1000.00 or $rounded === -1000.00) {
                return $sign . mb_substr(number_format($rounded, 0, '.', ' '), 0);

            } else {
                return $sign . mb_substr(number_format($rounded, 2, '.', ' '), 0);
            }


        }


        return $number;
    }


}