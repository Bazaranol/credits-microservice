<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class CreditController extends Controller
{
    public function createCreditAccount(Request $request){
        $data = Tariff::where('id', $request->tariffId)->first();

        $id = Credit::insertGetId([
            'ownerId' => $request->ownerId,
            'isClosed'=>0,
            'balance' => $data->balance,
            'debt' => 0,
            'accountNumber' => rand(0,10000000),
            'tariffId' => $data->id,
            'percent'=>$data->percent
        ]);

        return response()->json([
            'id' => $id,
        ]);
    }

    public function creditAccounts(Request $request) {
        $accounts = Credit::where('ownerId', $request->ownerId)->get();

        return response()->json($accounts);
    }

    public function detailsCreditAccount(Request $request){
        $accountData = Credit::where('id', $request->id)->first();

        return response()->json($accountData);
    }
    public function fillCreditAccount(Request $request){
        $validated=$request->validate([
            'money' => 'required'
        ]);
        $data = DB::table('credits')->where('id', $request->id)->first();
        $debt = $data->debt;
        $balance = $data->balance;
        $balance += $request->money;
        $debt -= $request->money;

        DB::table('credits')->where('id', $request->id)
            ->update([
                'balance' => $balance,
                'debt' => $debt,
            ]);

//        Operations::insert([
//            'receiverId' => $data->ownerId,
//            'senderId'=> 0,
//            'amount'=> $request->money,
//            'status' => 'Incoming',
//            'date' => Carbon::now()->format('Y-m-d H:i:s'),
//        ]);
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function withdrawalCreditAccount(Request $request){
        $validated=$request->validate([
            'money' => 'required'
        ]);
        $data = DB::table('credits')->where('id', $request->id)->first();
        $balance = $data->balance;
        $balance -= $request->money;
        $percent = $data->percent / 100;
        DB::table('credits')->where('id', $request->id)
            ->update([
                'balance' => $balance,
                'debt' => $request->money + $request->money*$percent,
            ]);

//        Operations::insert([
//            'receiverId' => $data->ownerId,
//            'senderId'=> 0,
//            'amount'=> $request->money,
//            'status' => 'Incoming',
//            'date' => Carbon::now()->format('Y-m-d H:i:s'),
//        ]);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
