<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
         DB::table('news')->insert([
             'title'             => 'Lorem ipsum dolor sit',
             'slug'              => 'lorem-ipsum',
             'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
             'full_content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui nunc, condimentum a volutpat consectetur, pulvinar sit amet turpis. Donec finibus eu risus eget porta. Proin rutrum at risus vel viverra. Aliquam sit amet hendrerit orci. Sed volutpat vitae ante ac mattis. Praesent id neque vestibulum, hendrerit mauris eget, pretium mauris. Proin gravida nisi turpis, quis ornare eros rutrum id. Ut cursus ultricies semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc sodales erat leo, ac laoreet erat placerat sit amet. In eget libero mi. Integer ut faucibus dolor.',
             'author'            => 'John',
             'category'          => 'Sports',
             'created_at'        => date('Y-m-d H:i:s'),
             'updated_at'        => date('Y-m-d H:i:s'),
         ]);
     }
}
