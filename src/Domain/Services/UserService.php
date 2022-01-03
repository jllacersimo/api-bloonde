<?php

namespace Src\Domain\Services;


use Src\Domain\Contracts\UserRepository;
use Src\Domain\Requests\LoginUserRequest;


class UserService
{

    /** @var UserRepository */
    private $userRepository;


    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }


    public function login(LoginUserRequest $request)
    {

        $user = $this->userRepository->findByEmailPassword($request->email, $request->password);

        return $this->userRepository->createAuthToken($user);
    }


}
