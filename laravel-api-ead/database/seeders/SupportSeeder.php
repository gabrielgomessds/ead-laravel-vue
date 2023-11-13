<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Support;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Support::factory(10)->create(['user_id' => '47a4318d-0c58-4dce-b927-323df7a9b24d', 'lesson_id' => '041fbd1f-f895-46e2-8373-5a3ee7ad12a6']);
    }
}
