<?php

use PHPUnit\Framework\TestCase;
use rhp\services\searchRecipesService\SearchRecipesService;
use rhp\services\searchRecipesService\SearchRecipesServiceRequestFactory;
use rhp\services\ServiceResponse;

class SearchRecipesServiceTest extends TestCase
{
    public function testServiceShouldResponseAServiceResponseWhenServiceIsExecuted()
    {
        // Arrange
        $query = 'vegetarian';
        $page = 1;
        $provider = 'RecipePuppy';
        $service = new SearchRecipesService();
        $serviceRequestFactory = new SearchRecipesServiceRequestFactory();
        $serviceRequest = $serviceRequestFactory->build($query, $page, $provider);
        $service->execute($serviceRequest);
        $serviceResponse = $service->getServiceResponse();

        // Act
        $isInstanceOfServiceResponse = $serviceResponse instanceof ServiceResponse;

        // Assert
        $this->assertTrue($isInstanceOfServiceResponse);
    }

}
