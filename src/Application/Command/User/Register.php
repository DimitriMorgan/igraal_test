<?php

namespace Application\Command\User;

use Domain\Dto\User\RegisterDto;

class Register
{
    /** @var RegisterDto */
    public $registerDto;

    public function __construct(RegisterDto $registerDto)
    {
        $this->registerDto = $registerDto;
    }
}