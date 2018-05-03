<?php

namespace Domain\Repository;

use Domain\Model\User;

interface UserRepositoryInterface
{
    public function add(User $user): void;
}