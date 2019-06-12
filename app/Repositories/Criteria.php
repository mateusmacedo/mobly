<?php


namespace Mobly\Repositories;

use Mobly\Repositories\Contracts\Criteria as CriteriaInterface;

class Criteria implements CriteriaInterface
{
    private $key;
    private $value;

    /**
     * Criteria constructor.
     * @param $key
     * @param $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }
}
