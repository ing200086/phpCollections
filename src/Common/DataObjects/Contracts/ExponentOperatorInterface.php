<?php
namespace pUoM\Common\DataObjects\Contracts;

interface ExponentOperatorInterface
{
    /**
     * @param ExponentInterface $exponent
     */
    public static function invert(ExponentInterface $exponent);

    /**
     * @param ExponentInterface $exponent
     * @param $power
     */
    public static function pow(ExponentInterface $exponent, $power);

    /**
     * @param ExponentInterface $A
     * @param ExponentInterface $B
     */
    public static function merge(ExponentInterface $A, ExponentInterface $B);
}
