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
        $provider = '';
        $query = '';
        $page = '';
        $service = new SearchRecipesService();
        $serviceRequestFactory = new SearchRecipesServiceRequestFactory();
        $serviceRequest = $serviceRequestFactory->build($provider, $query, $page);
        $service->execute($serviceRequest);
        $serviceResponse = $service->getServiceResponse();

        // Act
        $isInstanceOfServiceResponse = $serviceResponse instanceof ServiceResponse;

        // Assert
        $this->assertTrue($isInstanceOfServiceResponse );
    }

}
