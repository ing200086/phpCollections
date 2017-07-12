<?php
namespace pUoM\Common;

use pUoM\Common\DataObjects\Contracts\ExponentInterface;
use pUoM\Common\DataObjects\Exponent;

abstract class UnitAbstract implements Contracts\UnitInterface
{
    /**
     * @var mixed
     */
    protected $core;

    /**
     * @var mixed
     */
    protected $exponent;

    /**
     * @return mixed
     */
    public function exponent(): ExponentInterface
    {
        return $this->exponent ?: Exponent::fromExplicit(1, 0);
    }

    /**
     * @return mixed
     */
    public function core()
    {
        return $this->core;
    }

    /**
     * @param  UnitAbstract $term
     * @return mixed
     */
    protected function exponentMerge(UnitAbstract $term)
    {
        return $this->exponent()->merge($term->exponent());
    }
}
