<?php

namespace App\Services;

use IntegrationRepository;

class IntegrationService
{
    public function __construct(
        protected IntegrationRepository $integrationRepository
    ) {
    }

    public function create(array $data)
    {
        return $this->integrationRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->integrationRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->integrationRepository->delete($id);
    }

    public function all()
    {
        return $this->integrationRepository->all();
    }
    
    public function find($id)
    {
        return $this->integrationRepository->find($id);
    }
}