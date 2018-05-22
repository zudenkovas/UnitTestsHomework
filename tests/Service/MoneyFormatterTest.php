<?php

namespace App\Tests\Service;

use App\Services\MoneyFormatter;
use App\Services\NumberFormatter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function testFormatEur()
    {

        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock->expects($this->once())
            ->method('format')
            ->willReturn('2.84M');

        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $result = $moneyFormatter->formatEur($numberFormatterMock);

        $this->assertEquals('2.84M €', $result);
    }

    public function testFormatUsd()
    {

        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock->expects($this->once())
            ->method('format')
            ->willReturn('2.84M');

        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $result = $moneyFormatter->formatUsd($numberFormatterMock);

        $this->assertEquals('$ 2.84M', $result);
    }
}
