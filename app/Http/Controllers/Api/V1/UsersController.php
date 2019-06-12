<?php

namespace Mobly\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mobly\Http\Requests\SearchRequest;
use Mobly\Http\Requests\UserRequest;
use Mobly\Http\Resources\User\UserCollectionResource;
use Mobly\Http\Resources\User\UserResource;
use Mobly\Models\User;
use Mobly\Repositories\Contracts\UserRepository as UserRepositoryInterface;
use Mobly\Services\Domain\Core\Contracts\UserDomainService as UserDomainServiceInterface;

class UsersController extends AbstractApiController
{

    public function __construct(UserDomainServiceInterface $service, UserRepositoryInterface $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
        $this->modelClass = User::class;
        $this->resourceClass = UserResource::class;
        $this->collectionResourceClass = UserCollectionResource::class;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->genericIndex($request);
    }

    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        return $this->generictStore($request->all());
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return $this->genericShow($user);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        return $this->genericUpdate($request->all(), $user);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        return $this->genericDestroy($user);
    }

    /**
     * @param SearchRequest $request
     * @return JsonResource
     */
    public function search(SearchRequest $request): JsonResource
    {
        return $this->genericSearch($request);
    }
}
