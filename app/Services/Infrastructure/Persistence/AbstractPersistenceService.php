<?php

namespace Mobly\Services\Infrastructure\Persistence;

use Exception;
use Mobly\Models\AbstractModel;

abstract class AbstractPersistenceService
{
    protected function genericPersist(AbstractModel $model)
    {
        try {
            $model->getConnection()->beginTransaction();
            $model->save();
            $model->getConnection()->commit();
        } catch (Exception $exception) {
            $model->getConnection()->rollBack();
            throw new $exception;
        }
        return $model->id;
    }

    protected function genericDestroy(AbstractModel $model)
    {
        try {
            $model->getConnection()->beginTransaction();
            $model->save();
            $model->getConnection()->commit();
        } catch (Exception $exception) {
            $model->getConnection()->rollBack();
            throw new $exception;
        }

        return $model->id;
    }
}
