<?php


use rhp\infrastructure\recipesProvider\RecipesProvider;

class RecipePuppyRecipesProviderFactory
{
    public function build(): RecipesProvider
    {
        return new RecipePuppyRecipesProvider();
    }
}