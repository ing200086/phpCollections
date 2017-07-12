<?php
namespace pUoM\Common\DataObjects;

use pUoM\Common\DataObjects\Contracts\ExponentInterface;

class ExponentOperator
{
    /**
     * @param ExponentInterface $exponent
     */
    public static function invert(ExponentInterface $exponent)
    {
        return $exponent::fromExplicit($exponent->denominator(), $exponent->numerator());
    }

    /**
     * @param ExponentInterface $exponent
     * @param $power
     */
    public static function pow(ExponentInterface $exponent, $power)
    {
        if ($power < 0) {
            $exponent = self::invert($exponent);
            $power = abs($power);
        }

        return $exponent::fromExplicit(
            $exponent->numerator() * $power,
            $exponent->denominator() * $power);
    }

    /**
     * @param ExponentInterface $A
     * @param ExponentInterface $B
     */
    public static function merge(ExponentInterface $A, ExponentInterface $B)
    {
        $numerator = $A->numerator() + $B->numerator();
        $denominator = $A->denominator() + $B->denominator();

        return $A::fromExplicit($numerator, $denominator);
    }
}
