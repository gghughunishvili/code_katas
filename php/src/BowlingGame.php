<?php


namespace App;

class BowlingGame
{
    // - The goal is to knock down all ten pins
    // - Each frame consists of throwing the ball twice to knock down all the pins
    // - If you knock down all the pins with the first ball, it is called a "strike"
    // - If you knock down all the pins with the second ball, it is called a "spare"
    // - Each game consists of ten frames. If you bowl a strike in the tenth frame, you get two more balls. If you throw a spare, you get one more ball.
    // - Scoring is based on the number of pins you knock down
    //   However, if you bowl a spare, you get to add the pins in your next ball to that frame. For strikes, you get the next two balls;

    const FRAMES_PER_GAME = 10;

    protected $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            // check for a strike
            if ($this->rolls[$roll] === 10) {
                $score += $this->rolls[$roll];
                $score += $this->rolls[$roll + 1];
                $score += $this->rolls[$roll + 2];

                $roll += 1;
            }

            // check for a spare
            elseif ($this->rolls[$roll] + $this->rolls[$roll + 1] === 10) {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
                $score += $this->rolls[$roll + 2];
                $roll += 2;
            } else {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];

                $roll += 2;
            }
        }
        return $score;
    }
}
