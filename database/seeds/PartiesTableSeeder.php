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
                'name'         => 'Joram Mwashighadi',
                'email'        => 'jomwashighadi@gmail.com',
                'password'     => Hash::make('admin'),
                'api_token'    => Str::random(60),
                'user_type'    => "ADMIN",
                'phone_number' => "0720123456"
            ],
            [
                'name'         => 'Harold Kioko',
                'email'        => 'technician@handyman.com',
                'password'     => Hash::make('password'),
                'api_token'    => Str::random(60),
                'user_type'    => "HANDYMAN",
                'phone_number' => "0720123456"
            ],
            [
                'name'         => 'Alphoso Makau',
                'email'        => 'client@handyman.com',
                'password'     => Hash::make('password'),
                'api_token'    => Str::random(60),
                'user_type'    => "CLIENT",
                'phone_number' => "0720123456"
            ]
        ];
        foreach ($users as $data) {
            $party = App\Party::create([
                'name'         => $data['name'],
                'email'        => $data['email'],
                'phone_number' => $data['phone_number']
            ]);
            
            $user = new App\User;

            $user->email     = $data['email'];
            $user->password  = $data['password'];
            $user->api_token = $data['api_token'];
            $user->type      = $data['user_type'];

            $party->user()->save($user);

            if($data['user_type'] == 'HANDYMAN'){
                $category = App\Category::all()->first();
                $party->categories()->attach($category); 
            }
        }
    }
}
