<?php

use Illuminate\Database\Seeder;
use App\Room;


class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $room = new Room();
        $room->region_id = '1';
        $room->nombre = 'Sala Central ';
        $room->direccion = 'OFICINA CENTRAL';
		$room->telefono = '5546546';
       
        
        $room->save();
    }
}
