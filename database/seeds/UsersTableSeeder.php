<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');

        $users = [
            [
            'id' => Str::uuid4(),
              'name' => 'Handyman Admin',
              'email' => 'admin@handyman.com',
              'password' => bcrypt('admin'),
              'user_type' => "ADMIN"
            ],
            [
            'id' => Str::uuid4(),
              'name' => 'Handmany Test',
              'email' => 'technician@handyman.com',
              'password' => bcrypt('password'),
              'user_type' => "HANDYMAN"
            ],
            [
            'id' => Str::uuid4(),
              'name' => 'Handyman Client',
              'email' => 'client@handyman.com',
              'password' => bcrypt('password'),
              'user_type' => "CLIENT"
            ]
        ];

        DB::table('users')->insert($users);

        $this->enableForeignKeys();
    }
}
