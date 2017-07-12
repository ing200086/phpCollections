<?php
namespace pUoM\Common\Collections;

abstract class DictionaryAbstract extends ReadOnlyDictionaryAbstract
{
    /**
     * @param $object
     */
    protected function add($key, $object)
    {
        if ($this->hasKey($key)) {
            $existing = $this->item($key);
            $this->setItem($key, $this->handleExisting($existing, $object));
        } else {
            $this->addNew($key, $object);
        }

        return $this;
    }

    /**
     * @param $collection
     */
    protected function mergeCollection($collection)
    {
        foreach ($collection as $key => $value) {
            $this->add($value, $key);
        }

        return $this;
    }

    /**
     * @param $existing
     * @param $object
     */
    protected function handleExisting($existing, $object)
    {
        return $object;
    }

    /**
     * @param $object
     */
    protected function setItem($key, $object)
    {
        $index = $this->indexOfKey($key);
        $this->data[$index] = $object;
    }

    /**
     * @param $object
     */
    protected function addNew($key, $object)
    {
        $this->key[] = $key;
        $this->data[$this->indexOfKey($key)] = $object;
    }
}
