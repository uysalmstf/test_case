<?php

namespace App\Services\Repositories;

use App\Models\Integration;
use App\Services\Interfaces\IDBInterface;

class IntegrationRepository implements IDBInterface
{

    protected $integration;

    public function __construct(Integration $integration)
    {
        $this->integration = $integration;
    }

    public function all()
    {
        return $this->integration->all();
    }

    public function create(array $data)
    {
        return $this->integration->create($data);
    }

    public function update(array $data, $id)
    {
        $user = $this->integration->findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->integration->findOrFail($id);
        $user->delete();
    }

    public function find($id)
    {
        return $this->integration->findOrFail($id);
    }
}