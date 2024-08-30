<?php

namespace Tests;

use App\UseCase\CreateUser;
use App\User;
use App\UserRepository;
use PHPUnit\Framework\TestCase;

class CreateUserTest extends TestCase
{
    public function testCreateUser()
    {
        $userRepository = $this->createMock(UserRepository::class);

        $mockUser = new User('nombre usuario', 'example@gmail.com', 'secret');

        $userRepository->method('save')->willReturn($mockUser);

        $createUser = new CreateUser($userRepository);

        $user = $createUser->execute([
            'name' => 'nombre usuario',
            'email' => 'example@gmail.com',
            'password' => 'secret'
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('nombre usuario', $user->getName());
        $this->assertEquals('example@gmail.com', $user->getEmail());
    }
}
