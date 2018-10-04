<?php

namespace rhp\services\searchRecipesService;


use rhp\services\ServiceRequest;

class SearchRecipesServiceRequest implements ServiceRequest
{
    private $provider;
    private $query;
    private $page;

    public function __construct(string $query, int $page, string $provider)
    {
        $this->query = $query;
        $this->page = $page;
        $this->provider = $provider;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getProvider() :string
    {
        return $this->provider;
    }
}