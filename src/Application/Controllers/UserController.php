<?php

namespace Src\Application\Controllers;


use App\Http\Controllers\Controller;
use Src\Application\Request\LoginUserHttpRequest;
use Src\Domain\Requests\LoginUserRequest;
use Src\Domain\Services\UserService;


class UserController extends Controller
{
    private $userService;

    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }


    public function login(LoginUserHttpRequest $request)
    {

        $token =  $this->userService->login(new LoginUserRequest($request->toArray()));
        return $this->makeSuccessResponse(['token' => $token], 201);
    }



}
