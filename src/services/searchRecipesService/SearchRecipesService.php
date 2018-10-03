<?php

namespace rhp\services\searchRecipesService;


use rhp\infrastructure\recipesProvider\RecipesProvider;
use rhp\services\Service;
use rhp\services\ServiceRequest;
use rhp\services\ServiceResponse;

class SearchRecipesService implements Service
{
    private $serviceResponseFactory;
    private $recipesProvider;
    private $recipes;

    public function __construct(RecipesProvider $recipesProvider)
    {
        $this->serviceResponseFactory = new SearchRecipesServiceResponseFactory();
        $this->recipesProvider = $recipesProvider;
    }

    public function execute(ServiceRequest $serviceRequest): void
    {
        $this->recipes = $this->recipesProvider->find();
    }

    public function getServiceResponse(): ServiceResponse
    {
        return $this->serviceResponseFactory->build(
            $this->recipes
        );
    }
}