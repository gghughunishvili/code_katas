<?php


use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** @test */
    function it_returns_fizz_for_multiples_of_three()
    {
        foreach ([3, 6, 9, 12] as $number) {
            $this->assertEquals('fizz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    function it_returns_buzz_for_multiples_of_five()
    {
        foreach ([5, 10, 20, 25, 35] as $number) {
            $this->assertEquals('buzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    function it_returns_fizzbuzz_for_multiples_of_five_and_three()
    {
        foreach ([15, 30, 45] as $number) {
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    function it_returns_the_number_when_not_divisible_of_three_or_five()
    {
        foreach ([1, 2, 11, 22, 23] as $number) {
            $this->assertEquals($number, FizzBuzz::convert($number));
        }
    }
}
