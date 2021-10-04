<?php

declare(strict_types=1);

namespace App\Api\v1\Account\Controller;


use App\Api\v1\Account\Request\SearchRequest;
use App\Api\v1\Account\Resource\ClientCollectionResource;
use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{

    /**
     * @var \App\Repositories\Client\ClientRepositoryInterface
     */
    private ClientRepositoryInterface $clientRepository;

    /**
     * @param \App\Repositories\Client\ClientRepositoryInterface $clientRepository
     */
    public function __construct(
        ClientRepositoryInterface $clientRepository
    ) {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param \App\Api\v1\Account\Request\SearchRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(SearchRequest $request): JsonResponse
    {

        $result = $this->clientRepository->search($request);

        return response()->json([
            'data'  => new ClientCollectionResource($result->items()),
            'links' => [
                'path'         => $result->path(),
                'firstPageUrl' => $result->url(1),
                'lastPageUrl'  => $result->url($result->lastPage()),
                'nextPageUrl'  => $result->nextPageUrl(),
                'prevPageUrl'  => $result->previousPageUrl(),
            ],
            'meta'  => [
                'currentPage' => $result->currentPage(),
                'from'        => $result->firstItem(),
                'lastPage'    => $result->lastPage(),
                'perPage'     => $result->perPage(),
                'to'          => $result->lastItem(),
                'total'       => $result->total(),
                'count'       => $result->perPage(),
            ],
        ]);
    }
}
