<?php

namespace Mobly\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserRepository
{
    /**
     * @param string $username
     * @return Collection
     */
    public function findByUsername(string $username): Collection;

    /**
     * @param string $first_name
     * @return Collection
     */
    public function findByFirstName(string $first_name): Collection;

    /**
     * @param string $last_name
     * @return Collection
     */
    public function findByLastName(string $last_name): Collection;
}
