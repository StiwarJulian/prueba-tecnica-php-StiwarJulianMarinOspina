<?php

namespace Tests;

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetName()
    {
        $user = new User('nombre usuario', 'example@gmail.com', 'secret');
        $this->assertEquals('nombre usuario', $user->getName());
    }

    public function testSetName()
    {
        $user = new User('nombre usuario', 'example@gmail.com', 'secret');
        $user->setName('nombre usuario 2');

        $this->assertEquals('nombre usuario 2', $user->getName());
    }

    public function testNameInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Nombre debe contener entre 2 y 100 caracteres');

        $user = new User('nombre usuario', '', 'secret');
        $user->setName('a');
    }

    public function testEmailInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Formato de email invalido');

        $user = new User('nombre usuario', 'email@gmail.com', 'secret');
        $user->setEmail('email');
    }

    public function testPasswordInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Contraseña debe contener al menos 8 caracteres');

        $user = new User('nombre usuario', '', '');
        $user->setPassword('1234567');
    }
}
