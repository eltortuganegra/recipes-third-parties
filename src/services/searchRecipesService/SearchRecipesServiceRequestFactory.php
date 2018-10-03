<?php

namespace rhp\services\searchRecipesService;


use rhp\services\ServiceRequest;

class SearchRecipesServiceRequestFactory
{
    public function build(string $query, string $page): ServiceRequest
    {
        return new SearchRecipesServiceRequest($query, $page);
    }
}