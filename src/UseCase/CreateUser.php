<?php

namespace App\UseCase;

use App\User;
use App\UserRepository;

class CreateUser
{
    public function __construct(private UserRepository $userRepository) {}

    /**
     * @param array $data
     * @return User
     */
    public function execute(array $data): User
    {
        $user = new User($data['name'], $data['email'], $data['password']);
        $this->userRepository->save($user);

        return $user;
    }
}
