<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Programming', 'Automation', 'Web design', 'Best Practices'];
        foreach ($categories as $category) {
            $cate = new Category();
            $cate->name = $category;
            $cate->slug = Str::slug($category);
            $cate->save();
        }
    }
}
