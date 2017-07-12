<?php
namespace pUoM\Common\Traits;

trait hasExplicitId
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    protected function setId($id)
    {
        $this->id = $id;
    }
}
