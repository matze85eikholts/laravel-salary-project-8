<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index() {
        $equipments = Equipment::all();
        return response()->json(['equipmnets' => $equipments],200);
    }

    public function show($id) {
        $equipments = Equipment::find($id);
        if($equipments) {
            return response()->json(['equipmnets' => $equipments],200);
        }else {
            return response()->json(['message' => 'Оборудование не найдено'],404);
        }
    }

    public function store(Request $request){

        $request->validate([
            'serial_number'=>'required|max:191',
            'type'=>'required|max:191',
            'year_production'=>'required|max:191',
            'mark'=>'required|max:191',
            'client_id'=>'required|max:191',

        ]);
        

        $equipment = new Equipment();
        $equipment->serial_number = $request->serial_number;
        $equipment->type = $request->type;
        $equipment->year_of_production = $request->year_production;
        $equipment->mark = $request->mark;
        $equipment->client_id = $request->client_id;
        $equipment->save();

        return response()->json(['message'=>'Equipment added successfully'],200);

    }

    public function update(Request $request, $id){
        
        $request->validate([
            'serial_number'=>'required|max:191',
            'type'=>'required|max:191',
            'year_production'=>'required|max:191',
            'mark'=>'required|max:191',
            'client_id'=>'required|max:191',

        ]);

        $equipment = Equipment::find($id);
        if($equipment) {
            $equipment->serial_number = $request->serial_number;
            $equipment->type = $request->type;
            $equipment->year_of_production = $request->year_production;
            $equipment->mark = $request->mark;
            $equipment->client_id = $request->client_id;
            $equipment->update();


            return response()->json(['message' => 'Данные об оборудовании были успешно обновлены'], 200);
        }else {
            return response()->json(['message' => 'Оборудование не найдено'], 404);
        }

    }
    public function destroy($id) {
        $equipment = Equipment::find($id);
        if($equipment) {
            $equipment->delete();
            return response()->json(['message' => 'Оборудование было удалено'], 200);
        } else {
            return response()->json(['message' => 'Оборудование не найдено'], 404);
        }
    }
}
