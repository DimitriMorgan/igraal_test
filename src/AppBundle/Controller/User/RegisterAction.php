<?php

namespace AppBundle\Controller\User;

use AppBundle\Form\Type\RegisterUserType;
use Application\Command\User\Register;
use Application\Command\User\RegisterHandler;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RegisterAction
{
    /** @var FormFactoryInterface */
    private $formFactory;
    /**
     * @var RegisterHandler
     */
    private $registerHandler;

    public function __construct(FormFactoryInterface $formFactory, RegisterHandler $registerHandler)
    {
        $this->formFactory = $formFactory;
        $this->registerHandler = $registerHandler;
    }

    public function __invoke(Request $request)
    {
        $form = $this->formFactory->create(RegisterUserType::class);
        $form->submit($request->request->all(), false);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->registerHandler->handle(new Register($form->getData()));
        }

        return new JsonResponse((string)$form->getErrors(true, false), 200, [], true);
    }
}