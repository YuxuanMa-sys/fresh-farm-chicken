<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class AddProductReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reviews:add {--count=5 : Number of reviews per product}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add reviews for each product with Pakistani names';

    /**
     * Pakistani names for reviews
     */
    private $pakistaniNames = [
        'Ahmed Khan',
        'Fatima Ali',
        'Muhammad Hassan',
        'Ayesha Rahman',
        'Ali Raza',
        'Sana Malik',
        'Usman Ahmed',
        'Zara Khan',
        'Hassan Ali',
        'Amina Khan',
        'Bilal Hassan',
        'Nadia Ahmed',
        'Imran Khan',
        'Sadia Ali',
        'Kamran Malik',
        'Hina Khan',
        'Faisal Ahmed',
        'Sara Hassan',
        'Adnan Ali',
        'Aisha Khan'
    ];

    /**
     * Review comments for products
     */
    private $reviewComments = [
        'Excellent quality! The chicken is very fresh and tender. Highly recommended!',
        'Great taste and texture. Will definitely order again from this farm.',
        'Very satisfied with the quality. The chicken is organic and healthy.',
        'Amazing product! The freshness is outstanding and the taste is delicious.',
        'Perfect for my family. The chicken is of premium quality and reasonably priced.',
        'Outstanding service and product quality. The chicken is very fresh.',
        'Love the taste and quality. This is exactly what I was looking for.',
        'Excellent customer service and the product exceeded my expectations.',
        'Very happy with the purchase. The chicken is fresh and delicious.',
        'Great value for money. The quality is exceptional and the taste is amazing.',
        'Highly recommend this product. The chicken is fresh, tender, and delicious.',
        'Excellent quality and taste. Will definitely be a regular customer.',
        'Very satisfied with the product. The chicken is fresh and healthy.',
        'Amazing taste and quality. This is the best chicken I have ever tasted.',
        'Perfect product for my needs. The quality is outstanding and the price is fair.'
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->option('count');
        
        // Get all published products
        $products = Product::where('is_publish', 1)->get();
        
        if ($products->isEmpty()) {
            $this->error('No published products found.');
            return 1;
        }

        $this->info("Found {$products->count()} published products. Adding {$count} reviews per product...");

        $totalReviewsAdded = 0;

        foreach ($products as $product) {
            $this->info("Adding reviews for product: {$product->title}");
            
            // Check if reviews already exist for this product
            $existingReviews = Review::where('item_id', $product->id)->count();
            
            if ($existingReviews >= $count) {
                $this->warn("Product '{$product->title}' already has {$existingReviews} reviews. Skipping...");
                continue;
            }

            $reviewsToAdd = $count - $existingReviews;
            
            for ($i = 0; $i < $reviewsToAdd; $i++) {
                // Get a random Pakistani name
                $name = $this->pakistaniNames[array_rand($this->pakistaniNames)];
                
                // Get a random review comment
                $comment = $this->reviewComments[array_rand($this->reviewComments)];
                
                // Generate a random rating (4-5 stars for positive reviews)
                $rating = rand(4, 5);
                
                // Create a user for this review if it doesn't exist
                $user = $this->getOrCreateUser($name);
                
                // Check if this user already reviewed this product
                $existingReview = Review::where('item_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();
                
                if ($existingReview) {
                    $this->warn("User {$name} already reviewed product '{$product->title}'. Skipping...");
                    continue;
                }

                // Create the review
                $review = Review::create([
                    'item_id' => $product->id,
                    'user_id' => $user->id,
                    'rating' => $rating,
                    'comments' => $comment,
                ]);

                if ($review) {
                    $this->line("✓ Added review by {$name} (Rating: {$rating}/5)");
                    $totalReviewsAdded++;
                } else {
                    $this->error("Failed to add review for {$name}");
                }
            }
        }

        $this->info("Successfully added {$totalReviewsAdded} reviews across all products!");
        
        return 0;
    }

    /**
     * Get or create a user for the review
     */
    private function getOrCreateUser($name)
    {
        // Check if user already exists
        $user = User::where('name', $name)->first();
        
        if ($user) {
            return $user;
        }

        // Create a new user
        $email = strtolower(str_replace(' ', '.', $name)) . '@example.com';
        
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password123'),
            'role_id' => 2, // Customer role
            'status_id' => 1, // Active status
        ]);

        return $user;
    }
}
