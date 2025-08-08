<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tp_option;

class UpdateCopyright extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copyright:update {year=2025}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update copyright year in the footer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $year = $this->argument('year');
        
        // Get the current footer options
        $footerOption = Tp_option::where('option_name', 'theme_option_footer')->first();
        
        if (!$footerOption) {
            $this->error('Footer options not found in database.');
            return 1;
        }
        
        // Decode the current options
        $currentOptions = json_decode($footerOption->option_value, true);
        
        if (!$currentOptions) {
            $this->error('Invalid footer options data.');
            return 1;
        }
        
        // Get current copyright text
        $currentCopyright = $currentOptions['copyright'] ?? '';
        
        // Update the year in the copyright text
        $updatedCopyright = preg_replace('/\b2022\b/', $year, $currentCopyright);
        
        if ($updatedCopyright === $currentCopyright) {
            $this->info('Copyright year is already up to date or no year found to update.');
            return 0;
        }
        
        // Update the options
        $currentOptions['copyright'] = $updatedCopyright;
        
        // Save back to database
        $footerOption->option_value = json_encode($currentOptions);
        $footerOption->save();
        
        $this->info("Copyright updated successfully from '{$currentCopyright}' to '{$updatedCopyright}'");
        
        return 0;
    }
}
