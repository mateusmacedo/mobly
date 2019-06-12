<?php

namespace Mobly\Http\Controllers\Contracts;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mobly\Models\AbstractModel;

interface ApiController
{
    public function genericIndex(Request $request);

    public function generictStore(array $data): JsonResponse;

    public function genericShow(AbstractModel $model): JsonResponse;

    public function genericUpdate(array $data, AbstractModel $model): JsonResponse;

    public function genericDestroy(AbstractModel $model): JsonResponse;

    public function genericSearch(Request $request);
}
