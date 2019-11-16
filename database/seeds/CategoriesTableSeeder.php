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
        $category->name='Biệt thự Villa';
        $category->save();

        $category=new Category;
        $category->name='Nhà sàn';
        $category->save();

        $category=new Category;
        $category->name='Nhà tầng';
        $category->save();


    }
}
