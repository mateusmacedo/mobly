<?php

namespace Mobly\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Mobly\Repositories\Contracts\UserRepository as UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{

    /**
     * @param string $username
     * @return Collection
     */
    public function findByUsername(string $username): Collection
    {
        $criteria = new Criteria('username', $username);

        return $this->findByWhere($criteria);
    }

    /**
     * @param string $first_name
     * @return Collection
     */
    public function findByFirstName(string $first_name): Collection
    {
        $criteria = new Criteria('first_name', $first_name);

        return $this->findByWhere($criteria);
    }

    /**
     * @param string $last_name
     * @return Collection
     */
    public function findByLastName(string $last_name): Collection
    {
        $criteria = new Criteria('last_name', $last_name);

        return $this->findByWhere($criteria);
    }
}
