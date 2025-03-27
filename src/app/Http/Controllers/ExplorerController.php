<?php

namespace App\Http\Controllers;

use App\Models\explorer;
use App\Models\Historic;
use Illuminate\Http\Request;
use App\Http\Controlles\HistoricController;

class ExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(explorer $explorer)
    {
        return $explorer->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|string",
            "age"=> "required|integer",
            "latitude"=>"required|string",
            "longitude"=> "required|string",
        ]);
        $explorer = explorer::create($request->all());
        return response()->json([$explorer,201]);
    }

    /**
     * Display the specified resource.
     */
    public function show(explorer $explorer)
    {
        return response()->json([
            "explorer"=>$explorer,
            "items"=> $explorer->items(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, explorer $explorer)
    {
        $poggers = $request->validate([
            "explorer_id"=>"required|integer",
            "latitude"=> "required|string",
            "longitude"=>"required|string",
        ]);
        $explorer->update($poggers);
        Historic::create($request->all());  
        return response()->json($explorer);
    }
    
}
