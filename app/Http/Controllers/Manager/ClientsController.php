<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        $clients = Client::all();
        return response()->json(['clients' => $clients],200);
    }
    public function show($id) {
        $clients = Client::find($id);
        if($clients) {
            return response()->json(['clients' => $clients],200);
        }else {
            return response()->json(['message' => 'Клиент не найден'],404);
        }
    }

    public function store(Request $request){
        $request->validate([
            'client_name'=>'required|max:191',
            'city'=>'required|max:191',
            'client_ITN'=>'required|max:191',
            'legal_address'=>'required|max:191',
            'physical_address'=>'required|max:191',
            'capital'=>'required|max:191',
            'client_bank'=>'required|max:191',
            'client_bank_account'=>'required|max:191',

        ]);

        $client = new Client();
        $client->client_name = $request->client_name;
        $client->city = $request->city;
        $client->client_ITN = $request->client_ITN;
        $client->legal_address = $request->legal_address;
        $client->physical_address = $request->physical_address;
        $client->capital = $request->capital;
        $client->client_bank = $request->client_bank;
        $client->client_bank_account = $request->client_bank_account;
        $client->save();

        return response()->json(['message'=>'Client added successfully'],200);

    }

    public function update(Request $request, $id){
        
        $request->validate([
            'client_name'=>'required|max:191',
            'city'=>'required|max:191',
            'client_ITN'=>'required|max:191',
            'legal_address'=>'required|max:191',
            'physical_address'=>'required|max:191',
            'capital'=>'required|max:191',
            'client_bank'=>'required|max:191',
            'client_bank_account'=>'required|max:191',

        ]);

        $client = Client::find($id);
        if($client) {
            $client->client_name = $request->client_name;
            $client->city = $request->city;
            $client->client_ITN = $request->client_ITN;
            $client->legal_address = $request->legal_address;
            $client->physical_address = $request->physical_address;
            $client->capital = $request->capital;
            $client->client_bank = $request->client_bank;
            $client->client_bank_account = $request->client_bank_account;
            $client->update();


            return response()->json(['message' => 'Данные о заказчике были успешно обновлены'], 200);
        }else {
            return response()->json(['message' => 'Клиент не найден'], 404);
        }

    }
    public function destroy($id) {
        $client = Client::find($id);
        if($client) {
            $client->delete();
            return response()->json(['message' => 'Клиент был удален'], 200);
        } else {
            return response()->json(['message' => 'Клиент не найден'], 404);
        }
    }
}
