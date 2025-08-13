<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveEmojisFromProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:remove-emojis {--update-pack-size : Update pack size from dozen to half dozen}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove emojis from product descriptions and optionally update pack size';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->option('update-pack-size')) {
            $this->updatePackSize();
        } else {
            $this->removeEmojis();
        }
    }

    /**
     * Remove emojis from all product descriptions
     */
    private function removeEmojis()
    {
        $this->info('Removing emojis from product descriptions...');
        
        $products = DB::table('products')->get();
        $updatedCount = 0;
        
        foreach ($products as $product) {
            $updates = [];
            
            // Clean short_desc if it exists
            if (!empty($product->short_desc)) {
                $updates['short_desc'] = $this->removeEmojisFromText($product->short_desc);
            }
            
            // Clean description if it exists
            if (!empty($product->description)) {
                $updates['description'] = $this->removeEmojisFromText($product->description);
            }
            
            // Clean og_description if it exists
            if (!empty($product->og_description)) {
                $updates['og_description'] = $this->removeEmojisFromText($product->og_description);
            }
            
            // Clean og_keywords if it exists
            if (!empty($product->og_keywords)) {
                $updates['og_keywords'] = $this->removeEmojisFromText($product->og_keywords);
            }
            
            // Update the product if there are changes
            if (!empty($updates)) {
                DB::table('products')
                    ->where('id', $product->id)
                    ->update($updates);
                $updatedCount++;
            }
        }
        
        $this->info("Updated {$updatedCount} products.");
    }

    /**
     * Update pack size from dozen to half dozen
     */
    private function updatePackSize()
    {
        $this->info('Updating pack size from "1 dozen (12 eggs)" to "half dozen (6 eggs)"...');
        
        $products = DB::table('products')->get();
        $updatedCount = 0;
        
        foreach ($products as $product) {
            $updates = [];
            
            // Update short_desc
            if (!empty($product->short_desc)) {
                $newShortDesc = str_replace(
                    '1 dozen (12 eggs)', 
                    'half dozen (6 eggs)', 
                    $product->short_desc
                );
                if ($newShortDesc !== $product->short_desc) {
                    $updates['short_desc'] = $newShortDesc;
                }
            }
            
            // Update description
            if (!empty($product->description)) {
                $newDescription = str_replace(
                    '1 dozen (12 eggs)', 
                    'half dozen (6 eggs)', 
                    $product->description
                );
                if ($newDescription !== $product->description) {
                    $updates['description'] = $newDescription;
                }
            }
            
            // Update og_description
            if (!empty($product->og_description)) {
                $newOgDescription = str_replace(
                    '1 dozen (12 eggs)', 
                    'half dozen (6 eggs)', 
                    $product->og_description
                );
                if ($newOgDescription !== $product->og_description) {
                    $updates['og_description'] = $newOgDescription;
                }
            }
            
            // Update the product if there are changes
            if (!empty($updates)) {
                DB::table('products')
                    ->where('id', $product->id)
                    ->update($updates);
                $updatedCount++;
            }
        }
        
        $this->info("Updated pack size for {$updatedCount} products.");
    }

    /**
     * Remove emojis from text
     * @param string $text
     * @return string
     */
    private function removeEmojisFromText($text)
    {
        if (empty($text)) {
            return $text;
        }
        
        // Remove emoji characters using regex
        $text = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $text); // Emoticons
        $text = preg_replace('/[\x{1F300}-\x{1F5FF}]/u', '', $text); // Misc Symbols and Pictographs
        $text = preg_replace('/[\x{1F680}-\x{1F6FF}]/u', '', $text); // Transport and Map
        $text = preg_replace('/[\x{1F1E0}-\x{1F1FF}]/u', '', $text); // Regional country flags
        $text = preg_replace('/[\x{2600}-\x{26FF}]/u', '', $text); // Misc symbols
        $text = preg_replace('/[\x{2700}-\x{27BF}]/u', '', $text); // Dingbats
        $text = preg_replace('/[\x{1F900}-\x{1F9FF}]/u', '', $text); // Supplemental Symbols and Pictographs
        $text = preg_replace('/[\x{1F018}-\x{1F270}]/u', '', $text); // Miscellaneous Symbols
        $text = preg_replace('/[\x{238C}-\x{2454}]/u', '', $text); // Miscellaneous Technical
        $text = preg_replace('/[\x{20D0}-\x{20FF}]/u', '', $text); // Combining Diacritical Marks for Symbols
        $text = preg_replace('/[\x{FE00}-\x{FE0F}]/u', '', $text); // Variation Selectors
        $text = preg_replace('/[\x{1F3FB}-\x{1F3FF}]/u', '', $text); // Emoji Modifier Fitzpatrick Type
        $text = preg_replace('/[\x{1F9B0}-\x{1F9B3}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9B4}-\x{1F9B6}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9B7}-\x{1F9BB}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9BC}-\x{1F9C0}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9C1}-\x{1F9C2}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9C3}-\x{1F9C4}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9C5}-\x{1F9C6}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9C7}-\x{1F9C8}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9C9}-\x{1F9CA}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9CB}-\x{1F9CC}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9CD}-\x{1F9CF}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9D0}-\x{1F9D1}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9D2}-\x{1F9D3}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9D4}-\x{1F9D5}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9D6}-\x{1F9D7}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9D8}-\x{1F9D9}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9DA}-\x{1F9DB}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9DC}-\x{1F9DD}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9DE}-\x{1F9DF}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9E0}-\x{1F9E1}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9E2}-\x{1F9E3}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9E4}-\x{1F9E5}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9E6}-\x{1F9E7}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9E8}-\x{1F9E9}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9EA}-\x{1F9EB}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9EC}-\x{1F9ED}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9EE}-\x{1F9EF}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9F0}-\x{1F9F1}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9F2}-\x{1F9F3}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9F4}-\x{1F9F5}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9F6}-\x{1F9F7}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9F8}-\x{1F9F9}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9FA}-\x{1F9FB}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9FC}-\x{1F9FD}]/u', '', $text); // Emoji Component Hair Style
        $text = preg_replace('/[\x{1F9FE}-\x{1F9FF}]/u', '', $text); // Emoji Component Hair Style
        
        // Remove any remaining emoji characters
        $text = preg_replace('/[\x{1F000}-\x{1F02F}]/u', '', $text);
        $text = preg_replace('/[\x{1F030}-\x{1F09F}]/u', '', $text);
        $text = preg_replace('/[\x{1F0A0}-\x{1F0FF}]/u', '', $text);
        $text = preg_replace('/[\x{1F100}-\x{1F64F}]/u', '', $text);
        $text = preg_replace('/[\x{1F650}-\x{1F67F}]/u', '', $text);
        $text = preg_replace('/[\x{1F680}-\x{1F6FF}]/u', '', $text);
        $text = preg_replace('/[\x{1F700}-\x{1F77F}]/u', '', $text);
        $text = preg_replace('/[\x{1F780}-\x{1F7FF}]/u', '', $text);
        $text = preg_replace('/[\x{1F800}-\x{1F8FF}]/u', '', $text);
        $text = preg_replace('/[\x{1F900}-\x{1F9FF}]/u', '', $text);
        $text = preg_replace('/[\x{1FA00}-\x{1FA6F}]/u', '', $text);
        $text = preg_replace('/[\x{1FA70}-\x{1FAFF}]/u', '', $text);
        $text = preg_replace('/[\x{1FB00}-\x{1FBFF}]/u', '', $text);
        
        // Clean up any extra spaces that might be left
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        
        return $text;
    }
}
