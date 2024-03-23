<?php

namespace App\Http\Controllers;

use App\CuisineType;
use App\Meal;
use App\Option;
use App\MenuItem;
use Illuminate\Http\Request;

class MenuItemApiController extends Controller
{
    public function getMenuItems(Request $request){
        $request->validate([
            'per_page' => 'nullable|integer|min:1',
            'current_page' => 'nullable',
            'category' => 'nullable|integer|min:1',
            'subcategory' => 'nullable|integer|min:1',
        ]);

        $perPage = $request->query('per_page', 0);
        $currentPage = $request->query('current_page', 1);
        $category = $request->query('category');
        $subcategory = $request->query('subcategory');

        if ($perPage == 0) {
            $perPage = PHP_INT_MAX;
        } else {
            $perPage = intval($perPage);
        }

        // Filter menu items by category and/or subcategory if provided
        $menu_items_query = Option::with('menu_item.cuisine_type', 'menu_item.meal');
        if ($category) {
            $menu_items_query->whereHas('menu_item.meal', function($query) use ($category) {
                $query->where('meal_id', $category);
            });
        }
        if ($subcategory) {
            $menu_items_query->whereHas('menu_item.cuisine_type', function($query) use ($subcategory) {
                $query->where('cuisine_type_id', $subcategory);
            });
        }

        $menu_items = $menu_items_query->paginate($perPage, ['*'], 'page', $currentPage);

        $transformedMenuItems = $menu_items->map(function ($menuItem) {
            return [
                "id" => $menuItem->id,
                "name" => $menuItem->name,
                "description" => "",
                "sellingPrice" => $menuItem->sale_price,
                "discount" => "",
                "discountType" => "",
                "discountValue" => "",
                "stockQty" => "",
                "image" => $menuItem->menu_item->imageURL,
                "category" => $menuItem->menu_item->meal->name,
                "subcategory" => $menuItem->menu_item->cuisine_type->name
            ];
        });

        return response()->json([
            "data" => $transformedMenuItems,
            "count" => $menu_items->total(),
            "_metadata" => [
                "current_page" => $menu_items->currentPage(),
                "per_page" => $perPage,
                "total_pages" => $menu_items->lastPage()
            ]
        ]);
    }




    public function getMenuItem($id){
        // Find the menu item by its ID
        $menuItem = Option::with('menu_item.cuisine_type', 'menu_item.meal')->findOrFail($id);

        // Transform the menu item data
        $transformedMenuItem = [
            "id" => $menuItem->id,
            "name" => $menuItem->name,
            "description" => "",
            "selling_price" => $menuItem->sale_price,
            "discount" => "",
            "discountType" => "",
            "discountValue" => "",
            "stockQty" => "",
            "image" => $menuItem->menu_item->photo_path,
            "category" => $menuItem->menu_item->meal->name,
            "subcategory" => $menuItem->menu_item->cuisine_type->name
        ];

        return response()->json([
            "status" => "success",
            "data" => $transformedMenuItem
        ]);
    }

    public function getCategories(){
        $meals = Meal::get();
        $formattedMeals = $meals->map(function ($meal) {
            return [
                "id" => $meal->id,
                "title" => $meal->name
            ];
        });

        return response()->json([
            "status" => 200,
            "data" => $formattedMeals
        ]);
    }


    public function getSubCategories(){
        $cuisine_types = CuisineType::get();
        $formattedCuisineTypes = $cuisine_types->map(function ($cuisine_types) {
            return [
                "id" => $cuisine_types->id,
                "title" => $cuisine_types->name,
                "category" => $cuisine_types->meal_id
            ];
        });

        return response()->json([
            "status" => 200,
            "data" => $formattedCuisineTypes
        ]);
    }
}
