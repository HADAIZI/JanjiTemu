<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            GroupSeeder::class,
            GroupRoleSeeder::class,
            UserSeeder::class,
            UserGroupSeeder::class,
            TagSeeder::class,
            EventSeeder::class,
            EventTagSeeder::class,
            CommentarySeeder::class,
            UserEventSeeder::class,
        ]);
    }
}
