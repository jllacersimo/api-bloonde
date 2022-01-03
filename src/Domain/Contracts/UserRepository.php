<?php

namespace Src\Domain\Contracts;


use Src\Domain\User;

interface UserRepository
{

    public function findById(int $user_id) : User;

    public function createAuthToken(User $user) : string;

    public function findByEmailPassword(string $email, string $password) : User;

    public function getSessionUserId() : int;

}
