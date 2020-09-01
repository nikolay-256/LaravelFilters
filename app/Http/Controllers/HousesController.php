<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HousesController extends Controller
{
    public function index(Request $request)
    {
		usleep(200000);//for show loader
		$bedrooms = $request->get('bedrooms');
		$bathrooms = $request->get('bathrooms');
		$storeys = $request->get('storeys');
		$garages = $request->get('garages');
		$price_gt = $request->get('price_gt');
		$price_lt = $request->get('price_lt');
    	$query = House::query();
    	
    	if($bedrooms) {
			$query->where('bedrooms', $bedrooms);
		}
    	if($bathrooms) {
			$query->where('bathrooms', $bathrooms);
		}
    	if($storeys) {
			$query->where('storeys', $storeys);
		}
    	if($garages) {
			$query->where('garages', $garages);
		}
    	if($price_gt) {
			$query->where('price','>=', $price_gt);
		}
    	if($price_lt) {
			$query->where('price','<=', $price_lt);
		}
        return response($query->get()->jsonSerialize(), Response::HTTP_OK);
    }
}
