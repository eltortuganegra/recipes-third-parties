<?php

use PHPUnit\Framework\TestCase;
use rhp\infrastructure\recipesProvider\MyRecipesProviderFactory;
use rhp\services\searchRecipesService\SearchRecipesService;
use rhp\services\searchRecipesService\SearchRecipesServiceRequestFactory;

class SearchRecipesServiceWithMyRecipesProviderTest extends TestCase
{

    private $service;

    public function setUp()
    {
        // Arrange
        $provider = 'MyRecipes';
        $query = 'vegetarian';
        $page = 1;
        $myRecipesProviderFactory = new MyRecipesProviderFactory();
        $myRecipesProvider = $myRecipesProviderFactory->build();
        $this->service = new SearchRecipesService($myRecipesProvider);
        $serviceRequestFactory = new SearchRecipesServiceRequestFactory();
        $serviceRequest = $serviceRequestFactory->build($provider, $query, $page);
        $this->service->execute($serviceRequest);
    }

    public function testServiceShouldResponseOneRecipeWhenProviderIsMyRecipesProvider()
    {
        // Act
        $serviceResponse = $this->service->getServiceResponse();
        $recipes = $serviceResponse->getRecipes();

        // Act
        $totalRecipes = count($recipes);

        // Assert
        $this->assertEquals(1, $totalRecipes);
    }

    public function testServiceShouldResponseOneRecipeWithSpecificTitleWhenProviderIsMyRecipesProvider()
    {
        // Act
        $serviceResponse = $this->service->getServiceResponse();
        $recipes = $serviceResponse->getRecipes();

        // Act
        $title = $recipes[0]['title'];

        // Assert
        $this->assertEquals('Vegetable-Pasta Oven Omelet', $title);
    }

}
