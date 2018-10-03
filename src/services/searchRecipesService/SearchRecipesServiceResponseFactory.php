<?php


namespace rhp\services\searchRecipesService;


use rhp\services\ServiceResponse;

class SearchRecipesServiceResponseFactory
{
    public function build(array $recipes): ServiceResponse
    {
        return new SearchRecipesServiceResponse($recipes);
    }
}