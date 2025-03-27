<?php

namespace App\Http\Controllers;

use App\Models\explorer;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "explorer_id" => "required|exists:explorers,id",
            "latitude" => "required|string",
            "longitude" => "required|string",
            "price" => "required|integer",
        ]);
        $item = Item::create($request->all());
        return response()->json($item, 201);
    }
    public function trade(Request $request)
    {
        $request->validate([
            "explorer1_id" => "required|integer",
            "explorer1_items" => "required|integer",
            ///////////////////////////////////////
            "explorer2_id" => "required|integer",
            "explorer2_items" => "required|integer",
        ]);

        $explorer1 = explorer::with("items")->findorFail($request["explorer1_id"]);
        $explorer2 = explorer::with("items")->findorFail($request["explorer2_id"]);

        $explorer1Item = $explorer1->items->wherein("id", $request->explorer1_items);
        $explorer2Item = $explorer2->items->wherein("id", $request->explorer2_items);

        $explorer1Total = 0;
        $explorer2Total = 0;

        foreach ($explorer1Item as $item) {
            $explorer1Total += $item->price;
        }
        foreach ($explorer2Item as $item) {
            $explorer2Total += $item->price;
        }    # code...

        if ($explorer1Total == $explorer2Total) {
            foreach ($explorer1Item as $item) {
                $item->update([
                    "explorer_id" => $explorer2->id,
                ]);
            }
            foreach ($explorer2Item as $item) {
                $item->update([
                    "explorer_id" => $explorer1->id,

                ]);
            }
            return response()->json([
                "troca bem sucedida"
            ]);
        } else {
            return response()->json("a troca não é justa, cancelando a operação");
        }
    }
}
