<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionTable extends Seeder
{
    /**
     * Run the database seeds.
     *//// @return void
     
    public function run()
    {
        
        $region = new Region();
        $region->nombre = 'Region I';
        $region->codigo = 'Cod001';
		$region->responsable = 'Carmen Garcia';
		$region->save();
    }
}
