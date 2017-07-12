<?php
namespace pUoM\Common\DataObjects;

use pUoM\Common\DataObjects\Contracts\ExponentInterface;

class ExponentCore implements ExponentInterface
{
    /**
     * @var mixed
     */
    protected $numerator;
    /**
     * @var mixed
     */
    protected $denominator;

    /**
     * @param $numerator
     * @param $denominator
     */
    protected function __construct($numerator, $denominator)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    /**
     * @return mixed
     */
    public function numerator()
    {
        return $this->numerator;
    }

    /**
     * @return mixed
     */
    public function denominator()
    {
        return $this->denominator;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->numerator() - $this->denominator();
    }

    /**
     * @param $numerator
     * @param $denominator
     */
    public static function fromExplicit($numerator, $denominator)
    {
        return new static($numerator, $denominator);
    }
}
