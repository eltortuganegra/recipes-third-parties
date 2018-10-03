<?php


namespace rhp\infrastructure\recipesProvider;


class MyRecipesProviderFactory
{
    public function build(): RecipesProvider
    {
        return new MyRecipesProvider();
    }
}