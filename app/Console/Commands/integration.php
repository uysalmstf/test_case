<?php

namespace App\Console\Commands;

use App\Enums\IntegrationEnums;
use App\Models\Integration as ModelsIntegration;
use App\Services\IntegrationService;
use App\Services\Repositories\IntegrationRepository;
use Illuminate\Console\Command;

class integration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:integration {type} {integration?} {username?} {password?} {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integration Process';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->argument('type');

        if ($type != "add" && $type != "update" && $type != "delete") {
            
            $this->error("Type mismatch");
            exit;
        }else {

            switch ($type) {
                case "add":
                    
                    $integration = $this->argument('integration');
                    $username = $this->argument('username');
                    $password = $this->argument('password');
                    
                    if ($integration == null) {
                        
                        $this->error('Integration Mismatch');
                        exit;
                    }

                    $integrationEnumValues = array_column(IntegrationEnums::cases(), 'value');
                    if (!in_array($integration, $integrationEnumValues)) {
                        
                        $this->error('Integration Value Mismatch');
                        exit;
                    }

                    $integrationRepository = new IntegrationRepository(new \App\Models\Integration());
                    $integrationRepository->create(array(
                        'integration' => $integration,
                        'username'=> $username,
                        'password'=> $password
                    ));

                    $this->info('Integration saved successfully');

                    break;

                case "update":
                    
                        $id = $this->argument('id');
                        $integration = $this->argument('integration');
                        $username = $this->argument('username');
                        $password = $this->argument('password');

                        if ($id == null) {
                            
                            $this->error('ID Mismatch');
                            exit;
                        }

                        if ($integration == null) {
                            
                            $this->error('Integration Mismatch');
                            exit;
                        }

                        $integrationEnumValues = array_column(IntegrationEnums::cases(), 'value');
                        if (!in_array($integration, $integrationEnumValues)) {
                            
                            $this->error('Integration Value Mismatch');
                            exit;
                        }
    
                        $integrationRepository = new IntegrationRepository(new \App\Models\Integration());
                        $integrationRepository->update(array(
                            'integration' => $integration,
                            'username'=> $username,
                            'password'=> $password
                        ), $id);
    
                        $this->info('Integration updated successfully');
    
                        break; 

                case "delete":
                    
                        $id = $this->argument('id');
                        if ($id == null) {
                            
                            $this->error('ID Mismatch');
                            exit;
                        }
                        
                        $integrationRepository = new IntegrationRepository(new \App\Models\Integration());
                        $integrationRepository->delete($id);
    
                        $this->info('Integration deleted successfully');
    
                        break;            
            } 
        }

    }
}
