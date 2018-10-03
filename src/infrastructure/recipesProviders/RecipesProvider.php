<?php

namespace rhp\infrastructure\recipesProvider;

interface RecipesProvider
{
    public function find(string $query, int $page): array;
}