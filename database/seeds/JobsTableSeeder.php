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
                "description" => 'Fix leaking sink',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "created_by"  => $party->id,
                "assigned_to" => $handyman->id,
                "status"      => "COMPLETE"
            ],
            [
                "description" => 'Fix cranky door',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "created_by"  => $party->id,
                "assigned_to" => $handyman->id,
                "status"      => "ONGOING"
            ],
            [
                "description" => 'Fix leaking ceiling',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "assigned_to" => $handyman->id,
                "created_by"  => $party->id,
                "status"      => "COMPLETE"
            ]
        ];

        DB::table('jobs')->insert($jobs);   
    }
}
