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
}
