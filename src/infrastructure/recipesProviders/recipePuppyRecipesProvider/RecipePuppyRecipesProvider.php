<?php


use rhp\infrastructure\recipesProvider\RecipesProvider;

class RecipePuppyRecipesProvider implements RecipesProvider
{
    private $client;
    private $endpoint;
    private $response;
    private $recipes;

    public function __construct()
    {
        $this->endpoint = 'http://www.recipepuppy.com/api/?';
        $this->client = new \GuzzleHttp\Client();
    }

    public function find(string $query, int $page): array
    {
        $this->setParametersToEndPoint($query, $page);
        $this->requestToEndpoint();
        $this->parseResponse();

        return $this->recipes;
    }

    private function setParametersToEndPoint(string $query, int $page): void
    {
        $this->endpoint .= 'q=' . $query . '&p=' . $page;
    }

    private function requestToEndpoint(): void
    {
        $this->response = $this->client->request('GET', $this->endpoint);
    }

    private function parseResponse(): void
    {
        $body = $this->response->getBody();
        $parsedResponse = json_decode($body->read($body->getSize()), true);
        $this->recipes = $parsedResponse['results'];
    }
}