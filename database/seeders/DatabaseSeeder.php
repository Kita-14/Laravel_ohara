<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TestSeeder;
use Database\Seeders\UserSeeder;
use App\Models\ContactForm;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // *factoryを利用した大量のデータ登録処理
        \App\Models\ContactForm::factory(1000)->create();

        // *1件ずつのだ実＾データ登録処理
        $this->call([
            TestSeeder::class,
            UserSeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
