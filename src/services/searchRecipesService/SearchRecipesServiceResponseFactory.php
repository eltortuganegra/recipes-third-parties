<?php


namespace rhp\services\searchRecipesService;


use rhp\services\ServiceResponse;

class SearchRecipesServiceResponseFactory
{
    public function build(): ServiceResponse
    {
        return new SearchRecipesServiceResponse();
    }
}