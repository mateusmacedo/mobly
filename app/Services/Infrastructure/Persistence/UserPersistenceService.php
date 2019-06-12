<?php


namespace Mobly\Services\Infrastructure\Persistence;

use Mobly\Models\AbstractModel;
use Mobly\Services\Infrastructure\Persistence\Contracts\UserPersistenceService as UserPersistenceServiceInterface;

class UserPersistenceService extends AbstractPersistenceService implements UserPersistenceServiceInterface
{

    public function persist(AbstractModel $model)
    {
        return $this->genericPersist($model);
    }

    public function destroy(AbstractModel $model)
    {
        return $this->genericDestroy($model);
    }
}
