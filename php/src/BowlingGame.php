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
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);

                $roll += 2;

                continue;
            }

            $roll += 2;
        }
        return $score;
    }

    private function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

    private function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    private function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    private function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    private function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    private function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}
