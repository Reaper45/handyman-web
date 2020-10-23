<?php

use Illuminate\Database\Seeder;

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

        // categories
        $carpentry = App\Category::where('name', 'Carpentry')->first();
        $plumbing  = App\Category::where('name', 'Plumbing')->first();
        $painting  = App\Category::where('name', 'Painting')->first();
        $general   = App\Category::where('name', 'General Handyman')->first();


        $jobs = [
            [
                // "description" => 'Fix leaking sink',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "location"    => 'Ruaka',
                // "amount"      => '3000',
                "created_by"  => $party->id,
                "assigned_to" => $handyman->id,
                "service_id"  => $carpentry->services()->first()->id,
                "status"      => "COMPLETE",
            ],
            [
                // "description" => 'Fix cranky door',
                "lat"         => '-4.048629',
                "lon"         => '39.704943',
                "location"    => 'Banana',
                // "amount"      => '3500',
                "created_by"  => $party->id,
                "assigned_to" => $handyman->id,
                "service_id"  => $plumbing->services()->first()->id,
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
                "service_id"  => $painting->services()->first()->id,
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
                "service_id"  => $plumbing->services()->first()->id,
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
                "service_id"  => $general->services()->first()->id,
                "status"      => "PENDING"
            ]
        ];


        foreach ($jobs as $job) {
            App\Job::create($job);
        }
    }
}
