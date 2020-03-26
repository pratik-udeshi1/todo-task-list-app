<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Response;

class CategoryController extends Controller
{
    public function getCategories(Request $request, $id = "")
    {
        $category = Category::all();

        // If ID is provided then fetch specific category..
        if ($id) {
            $category = $category->find($id);
        }

        if (!empty($category) && $category->count()) {
            $category = response($category, 200);
        } else {
            $category = response::json(['message' => 'No Category Found!'], 400);
        }

        return $category;
    }

    public function addCategory(Request $request)
    {
        return Category::create($request->all());
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->update($request->all());
        } else {
            $category = response::json(['message' => 'Category Not Found!'], 404);
        }

        return $category;
    }

    public function deleteCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if ($category) {
            // Softdeleting category
            $category->delete();
            $res = response::json(['message' => 'Category deleted successfully'], 200);
        } else {
            $res = response::json(['message' => 'Error occurred while deleting Category'], 400);
        }

        return $res;
    }

}
