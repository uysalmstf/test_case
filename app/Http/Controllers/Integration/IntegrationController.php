<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use App\Services\IntegrationService;
use App\Services\Interfaces\IDBInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use IntegrationRepository;

class IntegrationController extends Controller
{
    protected $integrationRepository;
    public function __construct(IDBInterface $integrationRepository) {
        $this->integrationRepository = $integrationRepository;
    }
    
    public function list(){

        $integrations = $this->integrationRepository->all();
        return response()->json($integrations);
    }




}
