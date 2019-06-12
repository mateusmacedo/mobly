<?php

namespace Mobly\Services\Domain\Core\Contracts;


use Mobly\Models\AbstractModel;

interface DomainService
{
    public function save(AbstractModel $model);

    public function delete(AbstractModel $model);

}
