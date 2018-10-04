<?php


use PHPUnit\Framework\TestCase;
use rhp\services\searchRecipesService\ProviderNotFoundException;
use rhp\services\searchRecipesService\SearchRecipesService;
use rhp\services\searchRecipesService\SearchRecipesServiceRequestFactory;

class ProviderNotFoundSearchRecipesServiceTest extends TestCase
{
    public function testItShouldThrowExceptionWhenProviderIsNotFound()
    {
        // Assert
        $this->expectException(ProviderNotFoundException::class);

        // Arrange
        $query = 'vegetarian';
        $page = 1;
        $provider = 'NoProvider';
        $service = new SearchRecipesService();
        $serviceRequestFactory = new SearchRecipesServiceRequestFactory();
        $serviceRequest = $serviceRequestFactory->build($query, $page, $provider);
        $service->execute($serviceRequest);
    }
}
