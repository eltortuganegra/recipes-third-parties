<?php

use PHPUnit\Framework\TestCase;
use rhp\services\searchRecipesService\SearchRecipesService;
use rhp\services\searchRecipesService\SearchRecipesServiceRequestFactory;

class SearchRecipesServiceWithMyRecipesProviderTest extends TestCase
{

    private $service;

    public function setUp()
    {
        // Arrange
        $query = 'vegetarian';
        $page = 1;
        $provider = 'MyRecipes';
        $this->service = new SearchRecipesService();
        $serviceRequestFactory = new SearchRecipesServiceRequestFactory();
        $serviceRequest = $serviceRequestFactory->build($query, $page, $provider);
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
