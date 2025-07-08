<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // *ダミーデータを1件ずつ作成
        DB::table('tests')->insert([
            ['text' => 'dummy01', 'created_at' => Now()],
            ['text' => 'dummy02', 'created_at' => Now()],
            ['text' => 'dummy03', 'created_at' => Now()],
            ['text' => 'dummy04', 'created_at' => Now()],
            ['text' => 'dummy05', 'created_at' => Now()],
        ]);
    }
}
