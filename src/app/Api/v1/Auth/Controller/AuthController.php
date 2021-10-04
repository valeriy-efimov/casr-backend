<?php

declare(strict_types=1);

namespace App\Api\v1\Auth\Controller;

use App\Api\v1\Auth\Request\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Services\Client\ClientServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @var \App\Services\Client\ClientServiceInterface
     */
    private ClientServiceInterface $clientService;

    /**
     * @var \App\Services\User\UserServiceInterface
     */
    private UserServiceInterface $userService;

    /**
     * @var \Illuminate\Database\DatabaseManager
     */
    private DatabaseManager $databaseManager;

    public function __construct(
        ClientServiceInterface $clientService,
        UserServiceInterface $userService,
        DatabaseManager $databaseManager
    ) {
        $this->clientService   = $clientService;
        $this->userService     = $userService;
        $this->databaseManager = $databaseManager;
    }

    /**
     * @param \App\Api\v1\Auth\Request\RegisterRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $this->databaseManager->beginTransaction();
        $client = $this->clientService->create($request);

        $this->userService->create($client, $request);
        $this->databaseManager->commit();
        return response()->json(['result' => true]);
    }
}
