<?php

namespace App\Http\Controllers;

use App\Models\Item;
class MediumVallueController extends Controller
{
    public function show() {
        $mediumValue = Item::avg("price");
        $itemsAboveHundred = Item::where("price", ">", 100)->get();

        return response()->json([
            "mediumValue" => $mediumValue,
            "itemsAboveHundred" => $itemsAboveHundred,
        ]);
    }
}
