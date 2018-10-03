<?php

namespace rhp\services\searchRecipesService;


use rhp\services\ServiceRequest;

class SearchRecipesServiceRequest implements ServiceRequest
{
    private $query;
    private $page;

    public function __construct(string $query, string $page)
    {
        $this->query = $query;
        $this->page = $page;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getPage(): string
    {
        return $this->page;
    }
}