<?php

namespace Mobly\Services\Domain\Core;

use Mobly\Models\AbstractModel;
use Mobly\Services\Domain\Core\Contracts\UserDomainService as UserDomainServiceInterface;

class UserDomainService extends AbstractDomainService implements UserDomainServiceInterface
{

    /**
     * @param AbstractModel $model
     */
    public function save(AbstractModel $model)
    {
        $this->genericSave($model);
    }

    /**
     * @param AbstractModel $model
     */
    public function delete(AbstractModel $model)
    {
        $this->genericDelete($model);
    }
}
