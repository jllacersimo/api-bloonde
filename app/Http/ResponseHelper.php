<?php
namespace App\Http;

use App\Exceptions\BaseException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use JsonSerializable;
use function response;

trait ResponseHelper
{
    /**
     * @param array $data
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeSuccessResponse($data = [], $code = 200)
    {
        return response()->json($data, $code);
    }

    /**
     * @param JsonSerializable $collection
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeCollectionResponse(JsonSerializable $collection, $code = 200)
    {
        if (App::environment('integration')) {
            $code = $this->contentIsEmpty($collection) ? 204 : $code;
        }

        if (isset($collection->resource) && $collection->resource instanceof LengthAwarePaginator) {
            return response((array) $collection->response()->getData(), $code)
                ->withHeaders(['Content-Type' => 'application/json']);
        }

        return $this->makeSuccessResponse(['data' => $collection], $code);
    }


    /**
     * @param string $error
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeErrorResponse($error, $code = 500)
    {
        return $this->makeSuccessResponse(['error' => $error], $code);
    }




    /**
     * @param JsonSerializable $instance
     *
     * @throws BaseException
     *
     * @return bool
     */
    private function contentIsEmpty(JsonSerializable $instance)
    {
        if (!isset($instance->resource)) {
            return ($instance->jsonSerialize() == []);
        } elseif ($instance->resource instanceof Collection) {
            return $instance->resource->isEmpty();
        } elseif ($instance->resource instanceof LengthAwarePaginator) {
            return $instance->resource->toArray()['data'] == [];
        }
        return false;
    }
}
