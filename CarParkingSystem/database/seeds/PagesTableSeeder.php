<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([[
            'title'=>'About Page',
            'content'=>'This is the About Page',
            'slug'=>'about'
        ],
        [
            'title' =>'Index Page',
            'content'=>'This is the Index Page',
            'slug'=>'index'
        ],
        [
            'title' => 'Registration Page',
            'content'=>'This is the Registration Page',
            'slug'=>'registration'
        ]
        ]);
    }
}
