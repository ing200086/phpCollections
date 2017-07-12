<?php
namespace pUoM\Common\Collections;

abstract class ReadOnlyDictionaryAbstract implements Contracts\IteratorInterface
{
    /**
     * @var mixed
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $key = [];

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->data[$this->position];
    }

    /**
     * @param $id
     */
    protected function hasKey($key)
    {
        return (false !== $this->indexOfKey($key));
    }

    /**
     * @param $key
     */
    protected function indexOfKey($key)
    {
        return array_search($key, $this->key, true);
    }

    /**
     * @param  $key
     * @return mixed
     */
    protected function item($key)
    {
        $index = $this->indexOfKey($key);
        return $this->data[$index];
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return $this->key[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function valid()
    {
        return isset($this->data[$this->position]);
    }
}
