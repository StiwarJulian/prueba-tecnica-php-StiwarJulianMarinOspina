<?php

namespace App\UseCase;

use App\Exceptions\UserDoesNotExistException;
use App\User;
use App\UserRepository;

class UserGetById
{
    public function __construct(private UserRepository $userRepository) {}

    public function execute(int $id): User
    {
        $user = $this->userRepository->getByIdOrFail($id);

        if (!$user) {
            throw new UserDoesNotExistException('Usuario no encontrado');
        }

        return $user;
    }
}
