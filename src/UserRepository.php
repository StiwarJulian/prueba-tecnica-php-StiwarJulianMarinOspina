<?php

namespace App;

interface UserRepository
{
    /**
     * @param User $user
     */
    public function save(User $user): User;

    /**
     * @param User $user
     */
    public function update(User $user): void;

    /**
     * @param User $user
     */
    public function delete(User $user): void;

    /**
     * @param int $id
     * @return User|null
     */
    public function getByIdOrFail(int $id): ?User;
}
