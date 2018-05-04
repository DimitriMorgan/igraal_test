<?php

namespace Domain\Repository;

use Domain\Model\User;

interface UserRepositoryInterface
{
    public function add(User $user): void;

    public function getByIdWithCommissions(int $id): ?User;

    public function getById(int $id): ?User;
}