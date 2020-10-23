<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        [
          'name'        =>'Plumbing',
          'description' => 'Any system that conveys fluids for a wide range of applications. i.e  pipes, valves, plumbing fixtures, tanks',
          'services'    => [
            new  App\Service([
              "amount" => '3500',
              "title"  => "Fix leaking sink",
            ])
          ]
        ],
        [
          'name'        =>'Painting',
          'description' => 'Easily book a certified Pro & they will take care of everything - a perfect colour match, quality materials, and a perfect finish every time!',
          'services'    => [
            new  App\Service([
              "amount" => '2500',
              "title"  => "Fix leaking ceiling",
            ])
          ],
        ],
        [
          'name'        => 'Tilling',
          'description' => 'Easily book a vetted and certified Pro & they will take care of your floors and walls - a clean finish, quality materials, and great aesthetics',
        ],
        [
          'name'        => 'Electrical',
          'description' => 'Book an assessment and the Pro will be with you in as quickly as 4 hours. Quotes are provided at set rates, and assessment costs are deducted from the total job value',
        ],
        [
          'name'        => 'Washing Machine',
          'description' => 'Book an assessment and the Pro will be with you in as quickly as 4 hours. Quotes are provided at set rates, and assessment costs are deducted from the total job value',
        ],
        [
          'name'        => 'Air Conditioning',
          'description' => 'If you are installing a new air-conditioning unit or are working on maintaining an existing unit, it is critical that you find the right experts to perform the service',
        ],
        [
          'name'        => 'Welding',
          'description' => 'Book an assessment and the Pro will be with you in as quickly as 4 hours. Quotes are provided at set rates, and assessment costs are deducted from the total job value',
        ],
        [
          'name'        => 'General Handyman',
          'description' => 'Book an assessment and the Pro will be with you in as quickly as 4 hours. Quotes are provided at set rates, and assessment costs are deducted from the total job value',
          'services'    => [
            new  App\Service([
              "amount" => '3500',
              "title"  => "Doing laundry",
            ])
          ],
        ],
        [
          'name'        => 'Carpentry',
          'description' => 'Book an assessment and the Pro will be with you in as quickly as 4 hours. Quotes are provided at set rates, and assessment costs are deducted from the total job value',
          'services'    => [
            new  App\Service([
              "amount" => '4500',
              "title"  => "Fix cranky dor",
            ])
          ],
        ],
      ];
      foreach ($categories as $data) {
        $category = App\Category::create([
          "name"        => $data['name'],
          "slug"        => Str::of($data['name'])->slug('-'),
          "description" => $data['description'],
        ]);

        if(array_key_exists('services', $data)) {
          $category->services()->saveMany($data['services']);
        }
      }
    }
}
