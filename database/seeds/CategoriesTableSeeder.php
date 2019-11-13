<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category=new Category;
        $category->name='luxury';
        $category->save();

        $category=new Category;
        $category->name='popularly';
        $category->save();

        $category=new Category;
        $category->name='villa';
        $category->save();


    }
}
