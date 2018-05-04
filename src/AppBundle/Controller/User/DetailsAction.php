<?php

namespace AppBundle\Controller\User;

use Application\Adapter\SerializerAdapterInterface;
use Application\Query\User\Details;
use Application\Query\User\DetailsHandler;
use Domain\Model\User;
use Infrastructure\Adapter\SerializerAdapter;
use Infrastructure\Helpers\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DetailsAction
{
    /** @var DetailsHandler */
    private $detailsHandler;

    /** @var SerializerAdapterInterface */
    private $serializer;

    public function __construct(DetailsHandler $detailsHandler, SerializerAdapter $serializer)
    {
        $this->detailsHandler = $detailsHandler;
        $this->serializer = $serializer;
    }

    public function __invoke(Request $request, User $user): JsonResponse
    {
        return new JsonResponse(
            $this->serializer->serialize(
                $this->detailsHandler->handle(
                    new Details($user)
                ),
                'json'),
            200,
            [],
            true
        );
    }
}