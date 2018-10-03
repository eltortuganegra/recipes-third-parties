<?php

namespace rhp\infrastructure\recipesProvider;

interface RecipesProvider
{
    public function find(): array;
}