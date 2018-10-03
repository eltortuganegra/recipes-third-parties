<?php

namespace rhp\services;


interface Service
{
    public function execute(ServiceRequest $serviceRequest): void;
    public function getServiceResponse(): ServiceResponse;
}