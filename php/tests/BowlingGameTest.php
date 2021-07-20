<?php


use App\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    function it_scores_a_gutter_game_as_zero()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 20) as $roll) {
            $bowlingGame->roll(0);
        }

        $this->assertSame(0, $bowlingGame->score());
    }

    /** @test */
    function it_scores_all_ones()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 20) as $roll) {
            $bowlingGame->roll(1);
        }

        $this->assertSame(20, $bowlingGame->score());
    }

    /** @test */
    function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $bowlingGame = new BowlingGame();

        $bowlingGame->roll(5);
        $bowlingGame->roll(5); // spare

        $bowlingGame->roll(8);

        foreach (range(1, 17) as $roll) {
            $bowlingGame->roll(0);
        }

        $this->assertSame(26, $bowlingGame->score());
    }

    /** @test */
    function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $bowlingGame = new BowlingGame();

        $bowlingGame->roll(10); // strike
        $bowlingGame->roll(5);

        $bowlingGame->roll(2);

        foreach (range(1, 16) as $roll) {
            $bowlingGame->roll(0);
        }

        $this->assertSame(24, $bowlingGame->score());
    }

    /** @test */
    function a_spare_on_the_final_frame_grants_one_extra_balls()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 18) as $roll) {
            $bowlingGame->roll(0);
        }

        $bowlingGame->roll(5);
        $bowlingGame->roll(5); // spare

        $bowlingGame->roll(5);

        $this->assertSame(15, $bowlingGame->score());
    }

    /** @test */
    function a_strike_on_the_final_frame_grants_two_extra_balls()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 18) as $roll) {
            $bowlingGame->roll(0);
        }

        $bowlingGame->roll(10); // strike
        $bowlingGame->roll(10);

        $bowlingGame->roll(10);

        $this->assertSame(30, $bowlingGame->score());
    }

    /** @test */
    function it_scores_a_perfect_game()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 10) as $roll) {
            $bowlingGame->roll(10);
        }

        $bowlingGame->roll(10);
        $bowlingGame->roll(10);

        $this->assertSame(300, $bowlingGame->score());
    }
}
