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
        $region->nombre = 'Area Programatica II';
        $region->codigo = 'APII';
        $region->responsable = 'AdministradorArea';
        $region->save();

        $region = new Region();
        $region->nombre = 'Area Programatica IIb';
        $region->codigo = 'APIIb';
        $region->responsable = 'AdministradorArea';
        $region->save();

        $region = new Region();
        $region->nombre = 'Area Programatica III';
        $region->codigo = 'APIII';
        $region->responsable = 'AdministradorArea';
        $region->save();

        $region = new Region();
        $region->nombre = 'Area Programatica IV';
        $region->codigo = 'APIV';
        $region->responsable = 'AdministradorArea';
        $region->save();


        $region = new Region();
        $region->nombre = 'Area Programatica V';
        $region->codigo = 'APV';
        $region->responsable = 'AdministradorArea';
        $region->save();


        $region = new Region();
        $region->nombre = 'Area Programatica VI';
        $region->codigo = 'APVI';
        $region->responsable = 'AdministradorArea';
        $region->save();


        $region = new Region();
        $region->nombre = 'Area Programatica VII';
        $region->codigo = 'APVII';
        $region->responsable = 'AdministradorArea';
        $region->save();


        $region = new Region();
        $region->nombre = 'Area Programatica VIII';
        $region->codigo = 'APVIII';
        $region->responsable = 'AdministradorArea';
        $region->save();


        $region = new Region();
        $region->nombre = 'Area Programatica IX';
        $region->codigo = 'APIX';
        $region->responsable = 'AdministradorArea';
        $region->save();


                $region = new Region();
        $region->nombre = 'Area Programatica X';
        $region->codigo = 'APX';
        $region->responsable = 'AdministradorArea';
        $region->save();


                $region = new Region();
        $region->nombre = 'Area Programatica APXI';
        $region->codigo = 'APXI';
        $region->responsable = 'AdministradorArea';
        $region->save();


    }
}
