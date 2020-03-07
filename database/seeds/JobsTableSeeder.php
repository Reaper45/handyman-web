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
        $job = new App\Job;
        $party = App\Party::whereEmail('client@handyman.com')->first();

        $job->category_id = App\Category::all()->first()->id;;
        $job->description = 'Fix leaking sink.';
        $job->lat = '-4.048629';
        $job->lon = '39.704943';
        $job->created_by = $party->id;

        $job->save();
    }
}
