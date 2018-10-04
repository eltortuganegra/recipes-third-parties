<?php


namespace rhp\infrastructure\recipesProvider\myRecipesProvider;


use rhp\infrastructure\recipesProvider\RecipesProvider;

class MyRecipesProviderFactory
{
    public function build(): RecipesProvider
    {
        return new MyRecipesProvider();
    }
}