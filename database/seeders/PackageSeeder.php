<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'name' => 'Starter',
            'description' => 'Perfect for small gatherings and celebrations',
            'price' => 1500.00,
            'max_guests' => 50,
            'category' => 'starter',
            'features' => ['Basic Coordination', 'Venue Sourcing', 'Vendor Referrals', 'Day-of Timeline'],
            'is_active' => true,
        ]);

        Package::create([
            'name' => 'Professional',
            'description' => 'Comprehensive event planning for medium to large events',
            'price' => 4500.00,
            'max_guests' => 200,
            'category' => 'professional',
            'features' => [
                'Full Event Planning',
                'Custom Design',
                'Vendor Management',
                'Budget Management',
                'Guest Coordination',
                'Timeline Creation',
                'Day-of Coordination',
            ],
            'is_active' => true,
        ]);

        Package::create([
            'name' => 'Premium',
            'description' => 'Ultimate luxury event experience with personalized service',
            'price' => 8500.00,
            'max_guests' => 500,
            'category' => 'premium',
            'features' => [
                'Complete Event Management',
                'Premium Vendor Network',
                'Custom Theme Design',
                'Full Logistics Planning',
                'VIP Guest Services',
                'Professional Photography',
                'Videography Services',
                '24/7 Event Support',
                'Post-Event Management',
                'Unlimited Consultations',
            ],
            'is_active' => true,
        ]);
    }
}
