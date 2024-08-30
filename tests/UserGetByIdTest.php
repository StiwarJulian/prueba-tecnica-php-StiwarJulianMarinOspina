<?php

namespace Tests;

use App\Exceptions\UserDoesNotExistException;
use App\UseCase\UserGetById;
use App\User;
use App\UserRepository;
use PHPUnit\Framework\TestCase;

class UserGetByIdTest extends TestCase
{
    private UserRepository $userRepository;
    private UserGetById $userGetById;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->userGetById = new UserGetById($this->userRepository);
    }

    public function testUserNotFoundById()
    {
        $userId = 2;
        $this->userRepository->method('getByIdOrFail')->willReturn(null);
        $this->expectException(UserDoesNotExistException::class);

        $this->userGetById->execute($userId);
    }

    public function testUserFoundById()
    {
        $userId = 1;
        $expectedUser = new User('prueba usuario', 'example@example.com', 'password123');

        $this->userRepository->method('getByIdOrFail')->with($userId)->willReturn($expectedUser);

        $user = $this->userGetById->execute($userId);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('prueba usuario', $user->getName());
        $this->assertEquals('example@example.com', $user->getEmail());
    }
}
