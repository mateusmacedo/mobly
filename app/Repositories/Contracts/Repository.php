<?php

namespace Mobly\Repositories\Contracts;

use Mobly\Repositories\CriteriaCollection;

interface Repository
{
    public function findAll();

    public function find(int $id);

    public function findByWhere(CriteriaCollection $criteria);
}
