<?php


namespace Tests;

require __DIR__ . '/../WallysWidgetsCalculator.php';

use PHPUnit\Framework\TestCase;
use WallysWidgetsCalculator;

class WallysWidgetsCalculatorTest extends TestCase
{
    private WallysWidgetsCalculator $calculator;

    protected function setUp()
    {
        $this->calculator = new WallysWidgetsCalculator();
    }

    /** @dataProvider packsDataProvider */
    public function testPacksAsExpected(int $widgetsRequired, array $packsExpected, array $packsAvailable = [250, 500, 5000, 2000, 1000])
    {
        $result = $this->calculator->getPacks($widgetsRequired, $packsAvailable);
        $this->assertEquals($packsExpected, $result);
    }

    public function packsDataProvider()
    {
        return [
            '1 returns 250' => [
                1, [250 => 1]
            ],
            '251 returns 500' => [
                251, [500 => 1]
            ],
            '750 returns 500 and 250' => [
                750, [500 => 1, 250 => 1]
            ],
            '751 returns 1000' => [
                751, [1000 => 1]
            ],
            '1001 returns 1000 and 250' => [
                1001, [1000 => 1, 250 => 1]
            ],
            '1650 returns 1000, 500 and 250' => [
                1650, [1000 => 1, 500 => 1, 250 => 1]
            ],
            '1999 returns 2000' => [
                1999, [2000 => 1]
            ],
            '44844 returns 9x5000' => [
                44844, [5000 => 9]
            ],
            '1975 returns 2000' => [
                1985, [2000 => 1]
            ],
            '1750 returns 1000, 500 and 250' => [
                1750, [1000 => 1, 500 => 1, 250 => 1]
            ],
            '19750 returns 3x5000, 2x2000, 1x500 and 1x250' => [
                19750, [5000 => 3, 2000 => 2, 500 => 1, 250 => 1]
            ],
            '4484 returns 2x2000 and 1x500' => [
                4484, [2000 => 2, 500 => 1]
            ],
            '6000 returns 5000 and 1000' => [
                6000, [5000 => 1, 1000 => 1]
            ],
            '3251 returns 2000, 1000 and 500' => [
                3251, [2000 => 1, 1000 => 1, 500 => 1]
            ],
            '4751 returns 5000' => [
                4751, [5000 => 1]
            ],
            '50251 returns 5000 and 500' => [
                50251, [5000 => 10, 500 => 1]
            ],
            '5000 returns 2x2000 and 1x1000 if no 5000 pack exists' => [
                5000, [2000 => 2, 1000 => 1], [250, 500, 1000, 2000]
            ],
            '251 returns 300 if 300 pack exists' => [
                251, [300 => 1], [250, 500, 1000, 2000, 5000, 300]
            ],
            '4999 returns 4999 if a pack of 4999 exists' => [
                4999, [4999 => 1], [250, 500, 1000, 2000, 4999, 5000]
            ],
            '4999 returns 1x5000 if 4998 exists' => [
                4999, [5000 => 1], [250, 500, 1000, 2000, 4998, 5000]
            ],
            '4700 returns 2x2000, 1x500 and 1x250 even if 4751 exists' => [
                4700, [2000 => 2, 500 => 1, 250 => 1], [250, 500, 1000, 2000, 4751, 5000],
            ],
            '5001 returns 4999 and 250' => [
                5001, [4999 => 1, 250 => 1], [250, 500, 1000, 2000, 4999, 5000]
            ],
            '2001 returns 1999 and 250' => [
                2001, [1999 => 1, 250 => 1], [250, 500, 1000, 2000, 1999, 5000]
            ],
            '600 returns 2x300' => [
                600, [300 => 2], [250, 300, 500, 1000, 2000, 5000]
            ],
            '2600 returns 2000 and 300 twice' => [
                2600, [2000 => 1, 300 => 2], [250, 300, 500, 1000, 2000, 5000]
            ]
        ];
    }
}
