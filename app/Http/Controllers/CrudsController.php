<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

class HousesController extends Controller
{
    public function index()
    {
        return response(House::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Generator $faker)
    {
        $house = new House();
        $house->name = $faker->lexify('????????');
        $house->color = $faker->boolean ? 'red' : 'green';
        $house->save();

        return response($house->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $house = House::findOrFail($id);
        $house->color = $request->color;
        $house->save();

        return response(null, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        House::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
