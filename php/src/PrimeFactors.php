<?php


namespace App;


class PrimeFactors
{
    public function generate($number)
    {
        $factors = [];

        for ($divisor = 2; $divisor <= $number; $divisor++) {
            while ($number % $divisor === 0) {
                $number /= $divisor;

                $factors[] = $divisor;
            }
        }

        if ($number > 1) {
            return [$number];
        }

        return $factors;
    }
}
