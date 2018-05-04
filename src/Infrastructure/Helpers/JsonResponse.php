<?php

namespace Infrastructure\Helpers;

use Symfony\Component\HttpFoundation\JsonResponse as SymfonyJsonResponse;

class JsonResponse extends SymfonyJsonResponse
{
    public function __construct($data = null, $status = 200, array $headers = [], bool $json = false)
    {
        $headers['Generation-Date'] = (new \DateTime('now'))->format('Y-m-d H:i:s');
        parent::__construct($data, $status, $headers, $json);
    }
}