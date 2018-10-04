<?php


namespace rhp\infrastructure\recipesProviders\myRecipesRecipesProvider;


use rhp\infrastructure\recipesProvider\RecipesProvider;

class MyRecipesRecipesProviderFactory
{
    public function build(): RecipesProvider
    {
        return new MyRecipesRecipesProvider();
    }
}