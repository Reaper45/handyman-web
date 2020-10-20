<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
                'name'      => 'Joram Mwashighadi',
                'email'     => 'jomwashighadi@gmail.com',
                'password'  => Hash::make('admin'),
                'api_token' => Str::random(60),
                'user_type' => "ADMIN"
            ],
            [
                'name'      => 'Harold Kioko',
                'email'     => 'technician@handyman.com',
                'password'  => Hash::make('password'),
                'api_token' => Str::random(60),
                'user_type' => "HANDYMAN"
            ],
            [
                'name'      => 'Alphoso Makau',
                'email'     => 'client@handyman.com',
                'password'  => Hash::make('password'),
                'api_token' => Str::random(60),
                'user_type' => "CLIENT"
            ]
        ];
        foreach ($users as $user) {
            $party = App\Party::create(['name'=> $user['name'], 'email' => $user['email']]);
            
            $n = new App\User;

            $n->email     = $user['email'];
            $n->password  = $user['password'];
            $n->api_token = $user['api_token'];
            $n->type      = $user['user_type'];

            $party->user()->save($n);
        }
    }
}
