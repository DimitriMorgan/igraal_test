<?php

namespace AppBundle\ParamConverter\User;


use Domain\Model\User;
use Domain\Repository\UserRepositoryInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserIdParamConverter implements ParamConverterInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $userId = $request->attributes->get('userId');
        if (null === $userId) {
            return false;
        }

        $user = $this->userRepository->getById($userId);
        if (null === $user) {
            throw new NotFoundHttpException('User not found');
        }

        $request->attributes->set($configuration->getName(), $user);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ParamConverter $configuration): bool
    {
        return User::class === $configuration->getClass();
    }
}