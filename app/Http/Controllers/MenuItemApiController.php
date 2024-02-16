<?php

namespace App\Http\Controllers;

use App\CuisineType;
use App\Meal;
use App\Option;
use App\MenuItem;
use Illuminate\Http\Request;

class MenuItemApiController extends Controller
{
    //GET
    public function getMenuItems(){
        $menu_items = Option::with('menu_item.cuisine_type','menu_item.meal')->get();
         // Transform the menu items to change the field name
         $transformedMenuItems = $menu_items->map(function ($menuItem) {
            return [
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
        });
        return response()->json([
            "status" => "success",
            "data" => $transformedMenuItems
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
}
