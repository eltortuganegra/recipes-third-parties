<?php


use PHPUnit\Framework\TestCase;
use rhp\infrastructure\recipesProviders\myRecipesRecipesProvider\MyRecipesRecipesProviderFactory;


class MyRecipesRecipesProviderTest extends TestCase
{
    public function testMyRecipesProviderTestShouldFindOneElement()
    {
        // Arrange
        $query = 'vegetarian';
        $page = 1;
        $myRecipesProviderFactory = new MyRecipesRecipesProviderFactory();
        $myRecipesProvider = $myRecipesProviderFactory ->build();
        $recipes = $myRecipesProvider->find($query, $page);

        // Act
        $totalRecipes = count($recipes);

        // Assert
        $this->assertEquals(1, $totalRecipes);
    }
}