<?php

use Illuminate\Database\Seeder;
use \App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $category = new Category;
        $category->category = "Rock";
        $category->slug = str_slug("rock",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Pop";
        $category->slug = str_slug("pop",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Popular";
        $category->slug = str_slug("popular",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Vallenato";
        $category->slug = str_slug("vallenato",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Música Clásica";
        $category->slug = str_slug("Música Clásica",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Jazz";
        $category->slug = str_slug("jazz",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Norteño";
        $category->slug = str_slug("norteño",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Rap";
        $category->slug = str_slug("rap",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Salsa";
        $category->slug = str_slug("alsa",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Reggae";
        $category->slug = str_slug("reggae",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Reggaeton";
        $category->slug = str_slug("reggaeton",'-');
        $category->typeCategory_id = 1;
        $category->save();

        $category = new Category;
        $category->category = "Comedia";
        $category->slug = str_slug("comedia",'-');
        $category->typeCategory_id = 2;
        $category->save();
    }
}
