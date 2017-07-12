<?php
namespace pUoM\Common\DataObjects;

use pUoM\Common\DataObjects\Contracts\ExponentInterface;
use pUoM\Common\DataObjects\Contracts\ExponentOperatorInterface;

class Exponent extends ExponentCore implements ExponentInterface
{
    /**
     * @var mixed
     */
    protected $operator;

    /**
     * @param $numerator
     * @param $denominator
     * @param ExponentOperatorInterface $operator
     */
    protected function __construct($numerator, $denominator, ExponentOperatorInterface $operator = null)
    {
        parent::__construct($numerator, $denominator);
        $this->operator = $operator ?: (new ExponentOperator());
    }

    /**
     * @param Exponent $term
     */
    public function merge(ExponentInterface $term)
    {
        return $this->operator::merge($this, $term);
    }

    /**
     * @param $power
     */
    public function pow($power)
    {
        return $this->operator::pow($this, $power);
    }

    /**
     * @param ExponentInterface $term
     */
    public function invert()
    {
        return $this->operator::invert($this);
    }
}
