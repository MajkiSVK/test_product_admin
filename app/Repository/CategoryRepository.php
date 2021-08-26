<?php


namespace App\Repository;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function GetAllCategories():Collection
    {
        return Category::all();
 }
}
