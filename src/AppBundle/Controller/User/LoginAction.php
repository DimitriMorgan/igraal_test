<?php

namespace AppBundle\Controller\User;

use Application\Command\User\PostLogin;
use Application\Command\User\PostLoginHandler;
use Infrastructure\Helpers\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginAction
{
    /** @var PostLoginHandler */
    private $handler;

    public function __construct(PostLoginHandler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $userEmail = $authenticationUtils->getLastUsername();

        if (null !== $error) {
            throw new AccessDeniedException();
        }

        $this->handler->handle(new PostLogin($userEmail));

        return new JsonResponse('OK');
    }
}