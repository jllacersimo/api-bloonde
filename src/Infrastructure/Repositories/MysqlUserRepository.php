<?php

namespace Src\Infrastructure\Repositories;


use App\Exceptions\ForbiddenAccessException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Src\Domain\Contracts\UserRepository;
use Src\Domain\User;

class MysqlUserRepository implements UserRepository
{

    /**
     * Get the id of the logged user.
     * @return mixed
     */
    public function getSessionUserId() : int
    {
        return Auth::user()->id;
    }

    public function findById(int $user_id) : User
    {
        return User::where('id', $user_id)
            ->first();
    }

    public function findByEmailPassword(string $email, string $password) : User
    {
        $user = User::where('email', $email)
            ->first();


        if (!Hash::check($password, $user->getPassword())) {
            throw new ForbiddenAccessException("The password does not match");
        }

        return $user;
    }

    public function createAuthToken(User $user) : string
    {
        return $user->createToken('authToken')->accessToken;
    }

}
