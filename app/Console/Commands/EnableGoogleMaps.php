<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tp_option;

class EnableGoogleMaps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'googlemaps:enable {--api-key= : Google Maps API key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable Google Maps integration with API key';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiKey = $this->option('api-key');
        
        if (!$apiKey) {
            // Use a sample API key for testing (you should replace this with a real one)
            $apiKey = 'AIzaSyB41DRuKWuJdqpDZGK2-c4kKuRKGdYQqRY';
            $this->warn('No API key provided. Using sample API key for testing purposes.');
            $this->info('Please replace with your actual Google Maps API key in the admin panel.');
        }

        try {
            // Check if google_map option already exists
            $existingOption = Tp_option::where('option_name', 'google_map')->first();

            $optionValue = [
                'googlemap_apikey' => $apiKey,
                'is_googlemap' => 1
            ];

            if ($existingOption) {
                // Update existing option
                $existingOption->update([
                    'option_value' => json_encode($optionValue)
                ]);
                $this->info('Google Maps integration updated successfully!');
            } else {
                // Create new option
                Tp_option::create([
                    'option_name' => 'google_map',
                    'option_value' => json_encode($optionValue)
                ]);
                $this->info('Google Maps integration enabled successfully!');
            }

            $this->info('Google Maps API Key: ' . $apiKey);
            $this->info('Status: Enabled');
            $this->info('');
            $this->info('You can now view the interactive map on your "Our Story" page.');
            $this->info('To update the API key later, visit: Admin Panel > Settings > Google Map');

        } catch (\Exception $e) {
            $this->error('Failed to enable Google Maps integration: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
