<?php

namespace Mobly\Services\Infrastructure\Persistence\Contracts;

use Mobly\Models\AbstractModel;

interface PersistenceService
{
    public function persist(AbstractModel $model);

    public function destroy(AbstractModel $model);

}
