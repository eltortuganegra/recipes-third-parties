<?php

namespace rhp\services\searchRecipesService;


use rhp\services\Service;
use rhp\services\ServiceRequest;
use rhp\services\ServiceResponse;

class SearchRecipesService implements Service
{
    private $serviceResponseFactory;
    private $recipesProvider;
    private $recipes;
    private $query;
    private $page;
    private $provider;

    public function __construct()
    {
        $this->serviceResponseFactory = new SearchRecipesServiceResponseFactory();
    }

    public function execute(ServiceRequest $serviceRequest): void
    {
        $this->loadParameterFromRequest($serviceRequest);
        $this->loadRecipesProvider();
        $this->searchRecipes();
    }

    public function getServiceResponse(): ServiceResponse
    {
        return $this->serviceResponseFactory->build(
            $this->recipes
        );
    }

    private function loadParameterFromRequest(ServiceRequest $serviceRequest): void
    {
        $this->loadQueryFromRequest($serviceRequest);
        $this->loadPageFromRequest($serviceRequest);
        $this->loadProviderFromRequest($serviceRequest);
    }

    private function loadQueryFromRequest(ServiceRequest $serviceRequest): void
    {
        $this->query = $serviceRequest->getQuery();
        assert( ! empty($this->query));
    }

    private function loadPageFromRequest(ServiceRequest $serviceRequest): void
    {
        $this->page = $serviceRequest->getPage();
        assert( ! empty($this->query));
    }

    private function loadProviderFromRequest(ServiceRequest $serviceRequest): void
    {
        $this->provider = $serviceRequest->getProvider();
        assert( ! empty($this->query));
    }

    private function loadRecipesProvider(): void
    {
        $recipeProviderFactoryClassName = $this->makeFactoryName();
        if ( ! $this->isRecipesProviderAvailable($recipeProviderFactoryClassName)) {
            throw new ProviderNotFoundException();
        }

        $recipesProviderFactory = new $recipeProviderFactoryClassName();
        $this->recipesProvider = $recipesProviderFactory->build($this->query, $this->page);
    }

    private function makeFactoryName(): string
    {
        $recipeProviderFactoryClassName = 'rhp\\infrastructure\\recipesProviders\\'
            . lcfirst($this->provider) . 'RecipesProvider\\'
            . $this->provider . 'RecipesProviderFactory';

        return $recipeProviderFactoryClassName;
    }

    private function isRecipesProviderAvailable($recipeProviderFactoryClassName): bool
    {
        return class_exists($recipeProviderFactoryClassName);
    }

    private function searchRecipes(): void
    {
        $this->recipes = $this->recipesProvider->find(
            $this->query,
            $this->page
        );
    }

}