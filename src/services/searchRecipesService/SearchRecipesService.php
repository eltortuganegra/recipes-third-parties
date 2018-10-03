<?php

namespace rhp\services\searchRecipesService;


use rhp\services\Service;
use rhp\services\ServiceRequest;
use rhp\services\ServiceResponse;

class SearchRecipesService implements Service
{
    private $serviceResponseFactory;

    public function __construct()
    {
        $this->serviceResponseFactory = new SearchRecipesServiceResponseFactory();
    }

    public function execute(ServiceRequest $serviceRequest): void
    {

    }

    public function getServiceResponse(): ServiceResponse
    {
        return $this->serviceResponseFactory->build();
    }
}