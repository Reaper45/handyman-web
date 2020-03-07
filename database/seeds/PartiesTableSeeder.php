<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                // 'id' => Uuid::uuid4(),
                'name' => 'Handyman Admin',
                'email' => 'jomwashighadi@gmail.com',
                'password' => Hash::make('admin'),
                'user_type' => "ADMIN"
            ],
            [
                // 'id' => Uuid::uuid4(),
                'name' => 'Handmany Test',
                'email' => 'technician@handyman.com',
                'password' => Hash::make('password'),
                'user_type' => "HANDYMAN"
            ],
            [
                // 'id' => Uuid::uuid4(),
                'name' => 'Handyman Client',
                'email' => 'client@handyman.com',
                'password' => Hash::make('password'),
                'user_type' => "CLIENT"
            ]
        ];
        foreach ($users as $user) {
            $party = App\Party::create(['name'=> $user['name'], 'email' => $user['email']]);
            $n = new App\User;
            $n->email = $user['email'];
            $n->password = $user['password'];
            $n->type = $user['user_type'];
            $party->user()->save($n);
        }
    }
}
