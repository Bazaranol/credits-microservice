<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tariff;
class TariffController extends Controller
{
    public function createTariff(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'percent' => 'required',
            'balance' => 'required',
        ]);

        Tariff::insert([
            'name' => $request->name,
            'percent' => $request->percent,
            'balance' => $request->balance,
        ]);

        return $this->getAllTariffs();
    }

    public function getAllTariffs(){
        $tariffData = Tariff::all()->toArray();
        return json_encode($tariffData, JSON_UNESCAPED_UNICODE);
    }
}
