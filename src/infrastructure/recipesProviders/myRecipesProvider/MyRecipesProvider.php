<?php

namespace rhp\infrastructure\recipesProvider\myRecipesProvider;

use rhp\infrastructure\recipesProvider\RecipesProvider;

class MyRecipesProvider implements RecipesProvider
{
    private $recipes;

    public function __construct()
    {
        $this->recipes = [
            [
                "title" => "Vegetable-Pasta Oven Omelet",
                "href" => "http=>\/\/find.myrecipes.com\/recipes\/recipefinder.dyn?action=displayRecipe&recipe_id=520763",
                "ingredients" => "tomato, onions, red pepper, garlic, olive oil, zucchini, cream cheese, vermicelli, eggs, parmesan cheese, milk, italian seasoning, salt, black pepper",
                "thumbnail" => "http=>\/\/img.recipepuppy.com\/560556.jpg"
            ]
        ];
    }

    public function find(string $query, int $page): array
    {
        return $this->recipes;
    }
}