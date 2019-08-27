<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	///REGION II y IIB
        
		$room = new Room();
        $room->region_id = '14';
        $room->nombre = 'Centro Salud R. MENGHINI';
        $room->direccion = '25 de Mayo 396';
		$room->telefono = '484-0157';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '15';
        $room->nombre = 'Centro de Salud Dr. L. PIÑEIRO';
        $room->direccion = 'A.Vérez y Martín Gil';
		$room->telefono = '454-6309';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '15';
        $room->nombre = 'VILLA BORDEU';
        $room->direccion = 'Larrea y Ledesma';
		$room->telefono = '488-5679';
       
        
        $room->save();


        //Region III

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = 'LUJAN';
        $room->direccion = 'Enrique Julio 806';
		$room->telefono = '488-8351';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = 'CENTRO DE SALUD NORTE';
        $room->direccion = 'Viamonte 2853';
		$room->telefono = '488-8267';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = 'AVELLANEDA';
        $room->direccion = 'Nicaragua 2953';
		$room->telefono = '488-5679';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = 'VILLA FLORESTA';
        $room->direccion = 'Larrea y Ledesma';
		$room->telefono = '488-5679';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = 'NUEVA BELGRANO';
        $room->direccion = 'Larrea y Ledesma';
		$room->telefono = '488-5679';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = 'LATINO';
        $room->direccion = 'Larrea y Ledesma';
		$room->telefono = '488-5679';
       
        
        $room->save();

        //Region IV

 		$room = new Room();
        $room->region_id = '16';
        $room->nombre = 'ALDEA ROMANA';
        $room->direccion = 'Los Adobes 424';
		$room->telefono = '486-2444';
       
        
        $room->save();

 		$room = new Room();
        $room->region_id = '16';
        $room->nombre = 'PARQUE PATAGONIA';
        $room->direccion = 'Lauquen 356';
		$room->telefono = '486-2440';
       
        
        $room->save();

         		$room = new Room();
        $room->region_id = '16';
        $room->nombre = 'VILLA H. GREEN';
        $room->direccion = 'Salinas Chicas 4150';
		$room->telefono = '486-2447';
       
        
        $room->save();

         		$room = new Room();
        $room->region_id = '16';
        $room->nombre = 'GRUMBEIN';
        $room->direccion = 'Larrea y Ledesma';
		$room->telefono = '488-5679';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = 'VILLA GLORIA';
        $room->direccion = 'Rojas 4898';
		$room->telefono = '481-7321';
       
        
        $room->save();

        $room = new Room();
        $room->region_id = '16';
        $room->nombre = '12 DE OCTUBRE';
        $room->direccion = 'Humboldt 3758';
		$room->telefono = '481-1397';
       
        
        $room->save();

   		$room = new Room();
        $room->region_id = '16';
        $room->nombre = 'VILLA MUÑIZ';
        $room->direccion = 'Pilcaniyén 259';
		$room->telefono = '481-1080';
       
        
        $room->save();




    }
}
