<?php
/**
 * Created by PhpStorm.
 * User: MateusAnjos
 * Date: 18/12/2018
 * Time: 10:52
 */

namespace Mobly\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class AbstractResourceCollection extends ResourceCollection
{
    /**
     * @var array
     */
    public $additional;
    /**
     * @var string
     */
    protected $baseResource;

    /**
     * AbstractResourceCollection constructor.
     * @param $resource
     * @param array $additional
     */
    public function __construct($resource, array $additional)
    {
        $this->additional = $additional;
        parent::__construct($resource);

    }

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function toArray($request): AnonymousResourceCollection
    {

        return $this->getBaseResource()::collection($this->collection);
    }

    public function getBaseResource(): string
    {
        return $this->baseResource;
    }
}
