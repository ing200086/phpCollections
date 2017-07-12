<?php
namespace pUoM\Tests\Unit\Common\Collections;

use pUoM\Common\Collections\Contracts\IteratorInterface;
use pUoM\Tests\Unit\Common\Fakes\Collections\DictionaryAbstractFake;

/**
 * @group Unit
 */
class CollectionAbstractTest extends \pUoM\Tests\TestCase
{
    /**
     * @test
     */
    public function fake_can_be_made_and_counted()
    {
        $collection = $this->prepopulateFake();

        $this->assertEquals(2, $collection->count());
        $this->isInstanceOf(IteratorInterface::class, $collection);
    }

    /**
     * @test
     */
    public function can_check_if_key_exists()
    {
        $collection = $this->prepopulateFake(['length', 'time']);

        $this->assertTrue($collection->hasKey('length'));
        $this->assertFalse($collection->hasKey('no key'));
    }

    /**
     * @test
     */
    public function can_retrieve_item()
    {
        $collection = $this->prepopulateFake(['length', 'time'], ['dog', 'cat']);

        $this->assertEquals('dog', $collection->item('length'));
    }

    /**
     * @test
     */
    public function can_handle_existing()
    {
        $collection = $this->prepopulateFake(['length', 'time'], ['dog', 'cat']);

        $collection->addItem('length', 'baby');

        $this->assertEquals('baby', $collection->item('length'));
    }

    /**
     * @test
     */
    public function can_get_index_of_key()
    {
        $collection = $this->prepopulateFake(['length', 'time']);

        $this->assertEquals(0, $collection->indexOfKey('length'));
        $this->assertEquals(false, $collection->indexOfKey('no key'));
    }

    /**
     * @test
     */
    public function can_be_iterated_through()
    {
        $srcKeys = ['length', 'time'];
        $srcValues = ['cat', 'dog'];
        $collection = $this->prepopulateFake($srcKeys, $srcValues);

        $index = 0;
        foreach ($collection as $key => $value) {
            $this->assertEquals($srcKeys[$index], $key);
            $this->assertEquals($srcValues[$index], $value);
            $index++;
        }
    }

    /**
     * @param array $key
     * @param array $value
     */
    protected function prepopulateFake($key = ['length', 'time'], $value = ['cat', 'dog'])
    {
        return new DictionaryAbstractFake($key, $value);
    }
}
