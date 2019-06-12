<?php

namespace Mobly\Services\Domain\Core;

use Mobly\Models\AbstractModel;
use Mobly\Services\Infrastructure\Persistence\AbstractPersistenceService;
use Mobly\Services\Infrastructure\Persistence\Contracts\PersistenceService;

abstract class AbstractDomainService
{
    /** @var PersistenceService */
    protected $persistenceService;

    /**
     * AbstractDomainService constructor.
     * @param AbstractPersistenceService $persistenceService
     */
    public function __construct(AbstractPersistenceService $persistenceService)
    {
        $this->persistenceService = $persistenceService;
    }

    /**
     * @param AbstractModel $model
     */
    public function genericSave(AbstractModel $model)
    {
        $this->persistenceService->persist($model);
    }

    /**
     * @param AbstractModel $model
     */
    public function genericDelete(AbstractModel $model)
    {
        $this->persistenceService->destroy($model);
    }

}
