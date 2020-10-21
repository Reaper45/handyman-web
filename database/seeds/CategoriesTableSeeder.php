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
          'name'=>'Plumbing',
          'slug'=>Str::of('Plumbing')->slug('-'),
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Suspendisse interdum, velit nec blandit gravida, felis nulla dapibus
           odio, ac efficitur velit magna in purus.'
        ],
        [
          'name'=>'Painting',
          'slug'=>Str::of('Painter')->slug('-'),
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Suspendisse interdum, velit nec blandit gravida, felis nulla dapibus
           odio, ac efficitur velit magna in purus.'
        ],
        [
          'name'=>'Tilling',
          'slug'=>Str::of('Tilling')->slug('-'),
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Suspendisse interdum, velit nec blandit gravida, felis nulla dapibus
           odio, ac efficitur velit magna in purus.'
        ],
        [
          'name'=>'Electrical',
          'slug'=>Str::of('Electrical')->slug('-'),
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Suspendisse interdum, velit nec blandit gravida, felis nulla dapibus
           odio, ac efficitur velit magna in purus.'
        ],
        [
          'name'=>'Washing Machine',
          'slug'=>Str::of('Washing Machine')->slug('-'),
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Suspendisse interdum, velit nec blandit gravida, felis nulla dapibus
           odio, ac efficitur velit magna in purus.'
        ],
        [
          'name'=>'Air Conditioning',
          'slug'=>Str::of('Air Conditioning')->slug('-'),
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Suspendisse interdum, velit nec blandit gravida, felis nulla dapibus
           odio, ac efficitur velit magna in purus.'
        ],
        [
          'name'=>'Welding',
          'slug'=>Str::of('Welding')->slug('-'),
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Suspendisse interdum, velit nec blandit gravida, felis nulla dapibus
           odio, ac efficitur velit magna in purus.'
        ]
      ];
      foreach ($categories as $category) {
        App\Category::create($category);
      }

    //   $this->enableForeignKeys();
    }
}
