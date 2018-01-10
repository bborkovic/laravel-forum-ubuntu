<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // First level
        Category::create([ 'parent_id' => -1
            , 'name' => 'Drustvo', 'level' => 'root' ]);
        
        // Second level
        Category::create([ 'parent_id' => Category::where('name','Drustvo')->first()->id
            , 'name' => 'Politika', 'level' => 'forum' ]);
        Category::create([ 'parent_id' => Category::where('name','Drustvo')->first()->id
            , 'name' => 'Sport', 'level' => 'forum' ]);


        // Second level
        Category::create([ 'parent_id' => Category::where('name','Politika')->first()->id
            , 'name' => 'HDZ', 'level' => 'podforum' ]);
        Category::create([ 'parent_id' => Category::where('name','Politika')->first()->id
            , 'name' => 'SDP', 'level' => 'podforum' ]);
        Category::create([ 'parent_id' => Category::where('name','Sport')->first()->id
            , 'name' => 'Nogomet', 'level' => 'podforum' ]);
        Category::create([ 'parent_id' => Category::where('name','Sport')->first()->id
            , 'name' => 'Rukomet', 'level' => 'podforum' ]);

    }
}
