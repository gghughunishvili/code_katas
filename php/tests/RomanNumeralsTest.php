<?php


use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     * @dataProvider checks
     */
    function it_generates_expected_roman_numerals($expected, $number)
    {
        $this->assertEquals($expected, RomanNumerals::generate($number));
    }

    public function checks()
    {
        return [
            ['I', 1],
            ['II', 2],
            ['III', 3],
            ['IV', 4],
            ['VIII', 8],
            ['IX', 9],
            ['CD', 400],
            ['CM', 900],
            ['M', 1000],
            ['MMMCMXCVIII', 3998]
        ];
    }
}
