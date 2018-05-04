<?php

namespace Application\Command\User;

use Domain\Repository\UserRepositoryInterface;
use Symfony\Component\Process\Process;

class PostLoginHandler
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(PostLogin $command): void
    {
        $user = $this->userRepository->getByEmail($command->userEmail);
        $user->setLastLogin(new \DateTime());
        $this->userRepository->set($user);

        $process = new Process(\Infrastructure\Command\SendMail::NAME);

        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }
    }
}