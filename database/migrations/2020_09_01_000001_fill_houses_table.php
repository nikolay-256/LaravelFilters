<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		DB::table('houses')->insert([
			[
				'name' => 'The Victoria',
				'price' => 374662,
				'bedrooms' => 4,
				'bathrooms' => 2,
				'storeys' => 2,
				'garages' => 2,
			],
			[
				'name' => 'The Xavier',
				'price' => 513268,
				'bedrooms' => 4,
				'bathrooms' => 2,
				'storeys' => 1,
				'garages' => 2,
			],
			[
				'name' => 'The Como',
				'price' => 454990,
				'bedrooms' => 4,
				'bathrooms' => 3,
				'storeys' => 2,
				'garages' => 3,
			],
			[
				'name' => 'The Aspen',
				'price' => 384356,
				'bedrooms' => 4,
				'bathrooms' => 2,
				'storeys' => 2,
				'garages' => 2,
			],
			[
				'name' => 'The Lucretia',
				'price' => 572002,
				'bedrooms' => 4,
				'bathrooms' => 3,
				'storeys' => 2,
				'garages' => 2,
			],
			[
				'name' => 'The Toorak',
				'price' => 521951,
				'bedrooms' => 5,
				'bathrooms' => 2,
				'storeys' => 1,
				'garages' => 2,
			],
			[
				'name' => 'The Skyscape',
				'price' => 263604,
				'bedrooms' => 3,
				'bathrooms' => 2,
				'storeys' => 2,
				'garages' => 2,
			],
			[
				'name' => 'The Clifton',
				'price' => 386103,
				'bedrooms' => 3,
				'bathrooms' => 2,
				'storeys' => 1,
				'garages' => 1,
			],
			[
				'name' => 'The Geneva',
				'price' => 390600,
				'bedrooms' => 4,
				'bathrooms' => 3,
				'storeys' => 2,
				'garages' => 2,
			],
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		DB::table('houses')->truncate();
    }
}
