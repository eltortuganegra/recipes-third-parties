<?php

use PHPUnit\Framework\TestCase;
use rhp\infrastructure\recipesProviders\recipePuppyRecipesProvider\RecipePuppyRecipesProviderFactory;

class RecipePuppyProviderTest extends TestCase
{
    private $recipes;

    public function setUp()
    {
        // Arrange
        $query = 'vegetarian';
        $page = 1;
        $recipePuppyRecipesProviderFactory = new RecipePuppyRecipesProviderFactory();
        $recipePuppyRecipesProvider = $recipePuppyRecipesProviderFactory->build();
        $this->recipes = $recipePuppyRecipesProvider->find($query, $page);
    }

    public function testProviderShouldReturnFourRecipesWhenWeAreLookingForVegetarianRecipesAndOnePage()
    {
        // Act
        $totalRecipes = count($this->recipes);

        // Assert
        $this->assertEquals(10, $totalRecipes);
    }

    public function testFistRecipeShouldHaveATitleWhenWeAreLookingForVegetarianRecipesAndOnePage()
    {
        // Act
        $title = $this->recipes[0]['title'];

        // Assert
        $this->assertEquals('Vegetarian Turkey Stuffing', $title);
    }

}