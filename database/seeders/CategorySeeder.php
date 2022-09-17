<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'Bank', 'icon' => 'fa-credit-card', 'type' => 'subtract'],
            ['title' => 'Bills', 'icon' => 'fa-money-bill', 'type' => 'subtract'],
            ['title' => 'Car', 'icon' => 'fa-car', 'type' => 'subtract'],
            ['title' => 'Communications', 'icon' => 'fa-phone-alt', 'type' => 'subtract'],
            ['title' => 'Deposits', 'icon' => 'fa-coins', 'type' => 'add'],
            ['title' => 'Donations', 'icon' => 'fa-hand-holding-usd', 'type' => 'subtract'],
            ['title' => 'Entertainment', 'icon' => 'fa-theater-masks', 'type' => 'subtract'],
            ['title' => 'Food', 'icon' => 'fa-utensils', 'type' => 'subtract'],
            ['title' => 'Gifts', 'icon' => 'fa-gift', 'type' => 'subtract'],
            ['title' => 'Health', 'icon' => 'fa-medkit', 'type' => 'subtract'],
            ['title' => 'House', 'icon' => 'fa-home', 'type' => 'subtract'],
            ['title' => 'Pets', 'icon' => 'fa-paw', 'type' => 'subtract'],
            ['title' => 'Salary', 'icon' => 'fa-wallet', 'type' => 'add'],
            ['title' => 'Savings', 'icon' => 'fa-piggy-bank', 'type' => 'add'],
            ['title' => 'Shopping', 'icon' => 'fa-shopping-basket', 'type' => 'subtract'],
            ['title' => 'Sports', 'icon' => 'fa-futbol', 'type' => 'subtract'],
            ['title' => 'Taxi', 'icon' => 'fa-taxi', 'type' => 'subtract'],
            ['title' => 'Toiletry', 'icon' => 'fa-toilet-paper', 'type' => 'subtract'],
            ['title' => 'Transport', 'icon' => 'fa-bus-alt', 'type' => 'subtract'],
            ['title' => 'Others', 'icon' => 'fa-ellipsis-h', 'type' => 'subtract'],
        ];

        foreach($categories as $category)
        {
            Category::create([
                'title' => $category['title'],
                'icon' => $category['icon'],
                'type' => $category['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
