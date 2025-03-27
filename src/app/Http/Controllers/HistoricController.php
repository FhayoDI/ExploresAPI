<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreHistoricRequest;
use App\Http\Requests\UpdateHistoricRequest;
use App\Models\Historic;
use App\Models\explorer;

class HistoricController extends Controller
{

    public function addHistoric(StoreHistoricRequest $request, Historic $historic,explorer $explorer)
    {
        $request->validate([
            "explorer_id",
            "latitude",
            "longitude",
    ]);
        $historic = Historic::create($request->all());
    }
    public function show(Historic $historic)
    {
        return $historic->all();
    }
}
