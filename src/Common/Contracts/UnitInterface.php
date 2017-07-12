<?php
namespace pUoM\Common\Contracts;

use pUoM\Common\DataObjects\Contracts\ExponentInterface;

interface UnitInterface
{
    public function exponent(): ExponentInterface;
    public function core();

    // public function alias(UnitTransformerInterface $transform);
}
