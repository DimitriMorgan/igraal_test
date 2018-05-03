<?php

namespace Application\Command\User;

use Domain\Model\User;
use Domain\Repository\UserRepositoryInterface;

class RegisterHandler
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(Register $command): void
    {
        $registerDto = $command->registerDto;
        $user = new User(
            $registerDto->email,
            $registerDto->password,
            $registerDto->name,
            $registerDto->profileUrl,
            $registerDto->lastLogin,
            $registerDto->creationDate
        );

        $this->userRepository->add($user);
    }
}