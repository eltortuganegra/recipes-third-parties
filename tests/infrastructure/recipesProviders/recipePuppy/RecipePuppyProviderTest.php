<?php

use PHPUnit\Framework\TestCase;

class RecipePuppyProviderTest extends TestCase
{
    public function testProviderShouldReturnRecipesWhenWeAreLookingForRecipes()
    {
        // Arrange
        $query = 'vegetarian';
        $page = 1;
        $recipePuppyRecipesProviderFactory = new RecipePuppyRecipesProviderFactory();
        $recipePuppyRecipesProvider = $recipePuppyRecipesProviderFactory->build();
        $recipes = $recipePuppyRecipesProvider->find($query, $page);

        // Act
        $totalRecipes = count($recipes);

        // Assert
        $this->assertEquals(4, $totalRecipes);
    }

}