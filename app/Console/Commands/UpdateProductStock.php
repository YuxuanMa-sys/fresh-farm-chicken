<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class UpdateProductStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update-stock {quantity=10 : The stock quantity to set} {--product-ids=* : Specific product IDs to update (default: all)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update product stock quantities';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $quantity = (int) $this->argument('quantity');
        $productIds = $this->option('product-ids');

        $query = Product::query();
        
        if (!empty($productIds)) {
            // Convert string IDs to integers if needed
            $ids = [];
            foreach ($productIds as $id) {
                if (is_string($id) && strpos($id, ',') !== false) {
                    $ids = array_merge($ids, array_map('intval', explode(',', $id)));
                } else {
                    $ids[] = (int) $id;
                }
            }
            $query->whereIn('id', $ids);
        }

        $products = $query->get();
        
        if ($products->isEmpty()) {
            $this->error('No products found to update.');
            return Command::FAILURE;
        }

        $updatedCount = 0;
        foreach ($products as $product) {
            $product->update([
                'stock_qty' => $quantity,
                'stock_status_id' => 1 // Set to "In Stock"
            ]);
            $updatedCount++;
        }

        $this->info("Successfully updated {$updatedCount} products to have {$quantity} items in stock.");

        // Display updated products
        $this->info("\nUpdated products:");
        foreach ($products as $product) {
            $this->line("- {$product->title} (ID: {$product->id}) - Stock: {$product->stock_qty}");
        }

        return Command::SUCCESS;
    }
}
