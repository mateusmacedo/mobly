<?php


namespace Mobly\Repositories;


use Illuminate\Support\Collection;
use RuntimeException;

class CriteriaCollection
{
    private $items;

    public function __construct($items = [])
    {
        foreach ($items as $item) {
            if (!($item instanceof Criteria)) {
                throw new RuntimeException('$items must be an array of items of the type Mobly\Repositories\Contracts\Criteria implementation');
            }
        }

        $this->items = new Collection($items);

    }

    public static function factory(array $items = [])
    {
        $collection = new self();
        array_map(static function ($item) use ($collection) {
            $criteriaIntance = new Criteria($item['field'], $item['value']);
            $collection->push($criteriaIntance);
        }, $items);

        return $collection;

    }

    public function push(Criteria $value)
    {
        $this->items->push($value);
    }

    public function put($key, Criteria $value)
    {
        $this->items->put($key, $value);
    }

    public function contains(string $key)
    {
        return $this->items->contains($key);
    }

    public function count()
    {
        return $this->items->count();
    }

    public function each(callable $callback)
    {
        $this->items->each($callback);
    }


}
