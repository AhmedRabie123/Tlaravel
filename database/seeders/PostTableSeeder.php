<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $posts = [

        ['id'=>1, 'title'=>'post title 1', 'description'=>'', 'photo'=>''],
        ['id'=>2, 'title'=>'post title 2', 'description'=>'', 'photo'=>''],
        ['id'=>3, 'title'=>'post title 3', 'description'=>'', 'photo'=>'']

      ];

        post::insert($posts);

    }

    // email Admin [sara@gmail.com],
    // password [12]

     // email user [ahmed@gmail.com],
    // password [1234]

    
}
