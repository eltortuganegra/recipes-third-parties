<?php

namespace rhp\services\searchRecipesService;


use rhp\services\ServiceResponse;

class SearchRecipesServiceResponse implements ServiceResponse
{
    private $recipes;

    public function __construct(array $recipes)
    {
        $this->recipes = $recipes;
    }

    public function getRecipes(): array
    {
        return $this->recipes;
    }
}