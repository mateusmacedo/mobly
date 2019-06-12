<?php

namespace Mobly\Repositories;

use DomainException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Mobly\Models\AbstractModel;
use Mobly\Repositories\Contracts\Repository;

abstract class AbstractRepository implements Repository
{
    /** @var Model */
    protected $model;

    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(AbstractModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Collection
     * @throws DomainException
     */
    public function find(int $id): Collection
    {
        $result = $this->model->find($id);

        if ($result->count() > 0) {
            return $result;
        }

        throw new DomainException("No matches found");
    }

    /**
     * @return Collection
     * @throws DomainException
     */
    public function findAll(): Collection
    {
        $result = $this->model->all();

        if ($result->count() > 0) {
            return $result;
        }

        throw new DomainException("No matches found");
    }

    /**
     * @param CriteriaCollection $criterias
     * @return Collection
     */
    public function findByWhere(CriteriaCollection $criterias): Collection
    {
        $queryBuilder = $this->model->newQuery();
        $criterias->each(function ($value, $key) use ($queryBuilder) {
            if ($key == 0) {
                $queryBuilder->where($value->getKey(), $value->getValue());
            } else {
                $queryBuilder->orWhere($value->getKey(), $value->getValue());
            }
        });


        /** @var Collection $result */
        $result = $queryBuilder->get();

        if ($result->count() > 0) {
            return $result;
        }

        throw new DomainException("No matches found");
    }

}
