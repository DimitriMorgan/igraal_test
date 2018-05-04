<?php

namespace Application\Query\User;

use Domain\Model\User;

class Details
{
    /** @var User */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}