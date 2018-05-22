<?php

namespace App\Tests\Service;

use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase {

    public function getConvertData()
    {
        return [
            [8999999, '9.00M'],
            [999500, '1.00M'],
            [999400, '999K'],
            [535216, '535K'],
            [99950, '100K'],
            [27533.78, '27 534'],
            [999.99, '999.99'],
            [999.999999, '1 000'],
            [533.1, '533.10'],
            [66.6666, '66.67'],
            [0.055, '0.06'],
            [12.00, '12'],
            [-123654.89, '-124K'],
            [-8999999, '-9.00M'],
            [-999500, '-1.00M'],
            [-999400, '-999K'],
            [-535216, '-535K'],
            [-99950, '-100K'],
            [-27533.78, '-27 534'],
            [-999.99, '-999.99'],
            [-999.999999, '-1 000'],
            [-533.1, '-533.10'],
            [-66.6666, '-66.67'],
            [-0.055, '-0.06'],
            [-12.00, '-12'],
        ];
    }

    /**
     * @param $number
     * @param $expected*
     * @dataProvider getConvertData
     */
    public function testFormat($number, $expected){
        $formatter = new NumberFormatter();
        $result = $formatter->format($number);
        $this->assertEquals($expected, $result);
    }
}
