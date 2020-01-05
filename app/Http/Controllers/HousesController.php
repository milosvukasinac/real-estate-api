<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;

class HousesController extends Controller
{
    // create new house
    public function postHouse(Request $request) {
        $house = new House();
        $house->title = $request->title;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->image = $request->image;

        // save a new house
        $house->save();

        // return response with a message
        return response()->json(['message' => 'A new house is added successfully!'], 201);
    }

    // return all houses from the databases
    public function getAllHouses() {
        $houses = House::all();

        return response()->json(['houses' => $houses], 200);
    }

    // return the house with forwarded id
    public function getHouseById($id) {
        $house = House::find($id);

        return response()->json(['house' => $house], 200);
    } 

    // update the house
    public function updateHouse(Request $request, $id) {
        $house = House::find($id);

        // if house not founded, return error
        if(!$house) {
            return response()->json(['message' => 'House not found'], 404);
        }

        // update that house
        $house->title = $request->title;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->image = $request->image;

        // save updated house
        $house->save();

        // return response with updated house
        return response()->json(['house' => $house], 200);
    }

    // delete house with forwarded id
    public function deleteHouse($id) {
        $house = House::find($id);

        $house->delete();

        return response()->json(['message' => 'House is successfully deleted!'], 200);
    }
}
