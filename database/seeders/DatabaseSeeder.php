<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Altaf Hermansyah',
                'username' => 'altanix',
                'email' => 'admin@smk.com',
                'password' => bcrypt('asdasdasd'),
                'role' => 'admin',
                'is_active' => 'active',
                'group_id' => '1'
            ],
        ];

        foreach($data as $key => $d)
        {
            User::create($d);
        }
    }
}