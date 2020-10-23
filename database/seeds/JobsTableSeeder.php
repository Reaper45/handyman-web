<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $party    = App\Party::whereEmail('client@handyman.com')->first();
        $handyman = App\Party::whereEmail('technician@handyman.com')->first();

        $jobs = [
            [
                // "description" => 'Fix leaking sink',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "location"    => 'Ruaka',
                // "amount"      => '3000',
                "created_by"  => $party->id,
                "assigned_to" => $handyman->id,
                "status"      => "COMPLETE"
            ],
            [
                // "description" => 'Fix cranky door',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "location"    => 'Banana',
                // "amount"      => '3500',
                "created_by"  => $party->id,
                "assigned_to" => $handyman->id,
                "status"      => "ONGOING"
            ],
            [
                // "description" => 'Fix leaking ceiling',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "location"    => 'Rosslyn',
                // "amount"      => '2600',
                "assigned_to" => $handyman->id,
                "created_by"  => $party->id,
                "status"      => "COMPLETE"
            ],
            [
                // "description" => 'Fix leaking ceiling',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "location"    => 'Ruaka',
                // "amount"      => '6100',
                "assigned_to" => null,
                "created_by"  => $party->id,
                "status"      => "PENDING"
            ],
            [
                // "description" => 'Doing laundry',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "location"    => 'Rosslyn',
                // "amount"      => '4300',
                "assigned_to" => null,
                "created_by"  => $party->id,
                "status"      => "PENDING"
            ]
        ];

        DB::table('jobs')->insert($jobs);   
    }
}
