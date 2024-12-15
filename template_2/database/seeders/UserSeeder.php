<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@editor.com',
            'password' => Hash::make('password'),
        ]);
        $editor->assignRole('editor');
    }
}
