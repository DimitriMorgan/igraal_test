<?php

namespace Application\Query\User;

use Domain\Dto\User\CommissionDetailsDto;
use Domain\Dto\User\DetailsDto;
use Domain\Repository\UserRepositoryInterface;

class DetailsHandler
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(Details $query): DetailsDto
    {
        $user = $this->userRepository->getByIdWithCommissions($query->user->getId());
        $commissionsDetailsDto = [];

        foreach ($user->getCommissions() as $commission) {
            $commissionsDetailsDto[] = new CommissionDetailsDto(
                $commission->getCashback(),
                $commission->getDate()->format('Y-m-d H:i:is')
            );
        }

        return new DetailsDto(
            $user->getEmail(),
            $user->getName(),
            $user->getProfileUrl(),
            $user->getLastLogin()->format('Y-m-d H:i:is'),
            $user->getCreationDate()->format('Y-m-d H:i:is'),
            $commissionsDetailsDto
        );
    }
}