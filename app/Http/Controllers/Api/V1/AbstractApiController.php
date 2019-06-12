<?php


namespace Mobly\Http\Controllers\Api\V1;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mobly\Http\Controllers\Contracts\ApiController;
use Mobly\Http\Controllers\Controller;
use Mobly\Http\Resources\AbstractResourceCollection;
use Mobly\Models\AbstractModel;
use Mobly\Repositories\Contracts\Repository;
use Mobly\Repositories\CriteriaCollection;
use Mobly\Services\Domain\Core\Contracts\DomainService;

class AbstractApiController extends Controller implements ApiController
{
    protected const MSG_SUCCESS_CODE = 200;
    protected const MSG_FAIL_CODE = 400;
    protected const MSG_STORE_CODE = 201;
    protected const MSG_UPDATE_CODE = 201;
    protected const MSG_NOT_FOUND = 404;
    protected const MSG_SUCCESS = 'success';
    protected const MSG_FAIL = 'fail';
    protected $page = 1;
    protected $perPage = 15;
    /** @var AbstractModel */
    protected $modelClass;
    /** @var FormRequest */
    protected $requestClass;
    /** @var JsonResource */
    protected $resourceClass;
    /** @var AbstractResourceCollection */
    protected $collectionResourceClass;
    /** @var Repository */
    protected $repository;
    /** @var DomainService */
    protected $service;

    /**
     * @param Request $request
     * @return null
     */
    public function genericIndex(Request $request)
    {
        try {
            $this->setPaginationParams($request);
            $result = $this->repository->findAll();
            $additionalResponseData[self::MSG_SUCCESS] = true;
        } catch (Exception $exception) {
            $result = collect([]);
            $additionalResponseData[self::MSG_SUCCESS] = false;
            $additionalResponseData['messages'][] = $exception->getMessage();

        }

        return new $this->collectionResourceClass($result, $additionalResponseData);
    }

    /**
     * @param Request $request
     */
    protected function setPaginationParams(Request $request): void
    {
        $this->page = $request->input('page') ?? 1;
        $this->perPage = $request->input('perpage') ?? 15;
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public function generictStore(array $data): JsonResponse
    {
        try {
            $model = app($this->modelClass);
            $model->fill($data);
            $this->service->save($model);
            $additionalResponseData[self::MSG_SUCCESS] = true;
            $additionalResponseData['data'] = $model->id;
            $return_code = self::MSG_SUCCESS_CODE;
        } catch (Exception $exception) {
            $additionalResponseData[self::MSG_FAIL_CODE] = false;
            $additionalResponseData['messages'][] = $exception->getMessage();
            $return_code = self::MSG_FAIL_CODE;
        }

        return response()->json($additionalResponseData, $return_code);
    }

    /**
     * @param AbstractModel $model
     * @return JsonResponse
     */
    public function genericShow(AbstractModel $model): JsonResponse
    {
        try {
            $additionalResponseData[self::MSG_SUCCESS] = true;
            $additionalResponseData['data'] = new $this->resourceClass($model);
            $return_code = self::MSG_SUCCESS_CODE;
        } catch (Exception $exception) {
            $additionalResponseData[self::MSG_SUCCESS] = false;
            $additionalResponseData['messages'][] = $exception->getMessage();
            $return_code = self::MSG_FAIL_CODE;
        }
        return response()->json($additionalResponseData, $return_code);
    }

    /**
     * @param array $data
     * @param AbstractModel $model
     * @return JsonResponse
     */
    public function genericUpdate(array $data, AbstractModel $model): JsonResponse
    {
        try {
            $model->fill($data);
            $this->service->save($model);
            $additionalResponseData[self::MSG_SUCCESS] = true;
            $additionalResponseData['data'] = $model->id;
            $return_code = self::MSG_SUCCESS_CODE;
        } catch (Exception $exception) {
            $additionalResponseData[self::MSG_FAIL_CODE] = false;
            $additionalResponseData['messages'][] = $exception->getMessage();
            $return_code = self::MSG_FAIL_CODE;
        }

        return response()->json($additionalResponseData, $return_code);
    }

    /**
     * @param AbstractModel $model
     * @return JsonResponse
     */
    public function genericDestroy(AbstractModel $model): JsonResponse
    {
        try {
            $this->service->delete($model);
            $additionalResponseData[self::MSG_SUCCESS] = true;
            $return_code = self::MSG_SUCCESS_CODE;
        } catch (Exception $exception) {
            $additionalResponseData[self::MSG_FAIL_CODE] = false;
            $additionalResponseData['messages'][] = $exception->getMessage();
            $return_code = self::MSG_FAIL_CODE;
        }

        return response()->json($additionalResponseData, $return_code);
    }

    /**
     * @param Request $request
     * @return JsonResource
     */
    public function genericSearch(Request $request): JsonResource
    {
        try {
            $this->setPaginationParams($request);
            $criteria = CriteriaCollection::factory($request->get('params'));
            $result = $this->repository->findByWhere($criteria);
            $additionalResponseData[self::MSG_SUCCESS] = true;
        } catch (Exception $exception) {
            $result = collect([]);
            $additionalResponseData[self::MSG_SUCCESS] = false;
            $additionalResponseData['messages'][] = $exception->getMessage();
        }

        return new $this->collectionResourceClass($result, $additionalResponseData);
    }
}
