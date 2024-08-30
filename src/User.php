<?php

namespace App;

use InvalidArgumentException;

class User
{
    public function __construct(private string $name, private string $email, private string $password) {}

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Nombre no puede estar vacio');
        }

        if (strlen($name) < 2 || strlen($name) > 100) {
            throw new InvalidArgumentException('Nombre debe contener entre 2 y 100 caracteres');
        }

        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Formato de email invalido');
        }

        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        if (empty($password)) {
            throw new InvalidArgumentException('Contraseña no puede estar vacia');
        }
        if (strlen($password) < 8) {
            throw new InvalidArgumentException('Contraseña debe contener al menos 8 caracteres');
        }

        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
