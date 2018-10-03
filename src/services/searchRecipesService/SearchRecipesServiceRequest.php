<?php

namespace rhp\services\searchRecipesService;


use rhp\services\ServiceRequest;

class SearchRecipesServiceRequest implements ServiceRequest
{
    private $provider;
    private $query;
    private $page;

    public function __construct(string $provider, string $query, string $page)
    {
        $this->provider = $provider;
        $this->query = $query;
        $this->page = $page;
    }

    public function getProvider(): string
    {
        return $this->provider;
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