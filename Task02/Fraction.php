<?php

namespace Task02;

class Fraction
{
    private $numerator;
    private $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        if ($denominator == 0) {
            exit('Знаменатель не может быть равен 0.');
        }

        $this->numerator = $numerator;
        $this->denominator = $denominator;
        $this->reduceFraction();
    }

    public function getNumer(): int
    {
        return $this->numerator;
    }

    public function getDenom(): int
    {
        return $this->denominator;
    }

    public function add(Fraction $frac): Fraction
    {
        $newNumer = ($this->numerator * $frac->denominator) + ($this->denominator * $frac->numerator);
        $newDemo = $this->denominator * $frac->denominator;

        $sumFravtion = new Fraction($newNumer, $newDemo);

        return $sumFravtion;
    }

    public function sub(Fraction $frac): Fraction
    {
        $newNumer = ($this->numerator * $frac->denominator) - ($this->denominator * $frac->numerator);
        $newDemo = $this->denominator * $frac->denominator;

        $subFravtion = new Fraction($newNumer, $newDemo);

        return $subFravtion;
    }

    public function __toString()
    {
        if (abs($this->numerator) > $this->denominator) {
            $wholePart = intdiv($this->numerator, $this->denominator);
            $remainder = abs($this->numerator % $this->denominator);
            $stringFraction = "$wholePart`$remainder/$this->denominator";
        } else {
            $stringFraction = "$this->numerator/$this->denominator";
        }

        return $stringFraction;
    }

    private function reduceFraction()
    {
        $nod = $this->nod($this->numerator, $this->denominator);
        if ($nod != 1) {
            $this->numerator /= $nod;
            $this->denominator /= $nod;
        }

        if (($this->numerator < 0) && ($this->denominator < 0)) {
            $this->numerator = abs($this->numerator);
            $this->denominator = abs($this->denominator);
        } elseif ($this->denominator < 0) {
            $this->numerator = - ($this->numerator);
            $this->denominator = abs($this->denominator);
        }
    }

    private function nod($a, $b)
    {
        if ($b == 0) {
            return $a;
        } else {
            return $this->nod($b, $a % $b);
        }
    }
}?>