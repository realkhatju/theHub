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
        // Validate the request parameters
        $request->validate([
            'per_page' => 'nullable|integer|min:1', // Ensure per_page is an integer greater than or equal to 1
            'current_page' => 'nullable', // Allow current_page to be any value
        ]);

        // Get the per_page and current_page parameters from the request, default to 0 (all) and a very large number respectively if not provided
        $perPage = $request->query('per_page', 0); // Default to 0 (all)
        $currentPage = $request->query('current_page', PHP_INT_MAX); // Default to a very large number

        // If per_page is set to 0 (all), set it to a very large number to retrieve all items
        if ($perPage == 0) {
            $perPage = PHP_INT_MAX; // Set to maximum integer value
        } else {
            $perPage = intval($perPage); // Cast to integer for other values
        }

        // If current_page is set to a very large number, set it to 1 to retrieve the first page
        if ($currentPage == PHP_INT_MAX) {
            $currentPage = 1;
        }

        // Retrieve menu items with pagination
        $menu_items = Option::with('menu_item.cuisine_type', 'menu_item.meal')->paginate($perPage, ['*'], 'page', $currentPage);

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
        return response()->json([
                "status" => "success",
                "data" => $meals
        ]);
    }

    public function getSubCategories(){
        $cuisine_types = CuisineType::get();
        return response()->json([
            "status" => "success",
            "data" => $cuisine_types
        ]);
    }
    public function getMenuItemsCategories($id){
        $Category = Meal::findOrFail($id);
        return response()->json([
            "status" => 200,
            "title" => $Category->name
        ]);
    }
    public function getMenuItemsSubCategories($id){
        $SubCategory = CuisineType::findOrFail($id);
        return response()->json([
            "status" => 200,
            "title" => $SubCategory->name,
            "category" => $SubCategory->meal_id
        ]);
    }
}
