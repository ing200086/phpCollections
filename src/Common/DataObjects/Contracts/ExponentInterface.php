<?php
namespace pUoM\Common\DataObjects\Contracts;

interface ExponentInterface
{
    public function numerator();
    public function denominator();
    public function value();

    /**
     * @param $numerator
     * @param $denominator
     */
    public static function fromExplicit($numerator, $denominator);
}
