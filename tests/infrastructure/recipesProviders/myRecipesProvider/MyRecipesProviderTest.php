<?php


use PHPUnit\Framework\TestCase;
use rhp\infrastructure\recipesProvider\MyRecipesProviderFactory;

class MyRecipesProviderTest extends TestCase
{
    public function testMyRecipesProviderTestShouldFindOneElement()
    {
        // Arrange
        $myRecipesProviderFactory = new MyRecipesProviderFactory();
        $myRecipesProvider = $myRecipesProviderFactory ->build();
        $recipes = $myRecipesProvider->find();

        // Act
        $totalRecipes = count($recipes);

        // Assert
        $this->assertEquals(1, $totalRecipes);
    }
}