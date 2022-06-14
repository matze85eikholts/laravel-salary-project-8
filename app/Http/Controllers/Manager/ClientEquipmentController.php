<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Equipment;
use Illuminate\Http\Request;

class ClientEquipmentController extends Controller
{
    
    public function index() {
        $clients = DB::table('clients')
                    ->join('equipments', 'clients.id', '=', 'equipments.client_id')
                    ->select('clients.client_name','clients.city','clients.client_bank', 'equipments.type', 'equipments.mark')
                    ->get(); 
                    return response()->json(['clients' => $clients],200);
    } 
    public function show($id) {
        $clients = DB::table('clients')
                    ->join('equipments', 'clients.id', '=', 'equipments.client_id')
                    ->select('clients.client_name','clients.city','clients.client_bank', 'equipments.type', 'equipments.mark')
                    ->where('clients.id','=',$id)
                    ->get(); 
        if($clients) {            
                    return response()->json(['clients' => $clients],200);
        
        }else {
            return response()->json(['message' => 'Клиент не найден'],404);
        }
    }
        

}
