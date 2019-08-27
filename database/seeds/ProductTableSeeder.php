<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $producto = new Product();  
        $producto->nombre = 'Sabin';    //string
        $producto->codigo = 'SBN01';   //string
        $producto->unidad = 'ORAL';   //string
		$producto->requiereDescartable = '0';   //boolean
        $producto->dosis = 20;      //integer
        $producto->descartables = 0; //integer
     
        $producto->save();

		$producto = new Product();  
        $producto->nombre = 'Quintuple';    //string
        $producto->codigo = 'QUINT01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Anti Varicela';    //string
        $producto->codigo = 'ANVA01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();


        $producto = new Product();  
        $producto->nombre = 'Sextuple';    //string
        $producto->codigo = 'SEX01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();


        $producto = new Product();  
        $producto->nombre = 'Meningococo Menveo';    //string
        $producto->codigo = 'MEME01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'BCG';    //string
        $producto->codigo = 'BCG001';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 20;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'HPV';    //string
        $producto->codigo = 'HPV01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '0';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 0; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Triple Bacteriana';    //string
        $producto->codigo = 'TRBA01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 10;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Hepatitis B Pediátrica';    //string
        $producto->codigo = 'HEPBPE01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Hepatitis B Adulto';    //string
        $producto->codigo = 'HEPBAD01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 10;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Hepatitis A';    //string
        $producto->codigo = 'HEPA01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Prevenar 13';    //string
        $producto->codigo = 'PREV13';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '0';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 0; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Triple Bacteriana Acelular';    //string
        $producto->codigo = 'TBA01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 10;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Doble Bacteriana';    //string
        $producto->codigo = 'DOBAC01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 10;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Triple Viral';    //string
        $producto->codigo = 'TRIV01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Rotarix';    //string
        $producto->codigo = 'Rot01';   //string
        $producto->unidad = 'ORAL';   //string
		$producto->requiereDescartable = '0';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 0; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Antirrabica';    //string
        $producto->codigo = 'ANTR01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 3;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Pneumo 23';    //string
        $producto->codigo = 'PNEU23';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Fiebre Amarilla';    //string
        $producto->codigo = 'FIEBA01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 10;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();

        $producto = new Product();  
        $producto->nombre = 'Certificados';    //string
        $producto->codigo = 'Cert01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '1';   //boolean
        $producto->dosis = 10;      //integer
        $producto->descartables = 1; //integer
     
        $producto->save();


		$producto = new Product();  
        $producto->nombre = 'Salk';    //string
        $producto->codigo = 'SALK01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '0';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 0; //integer
     
        $producto->save();

		$producto = new Product();  
        $producto->nombre = 'Antigripal Adulto';    //string
        $producto->codigo = 'ANTIAD01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '0';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 0; //integer
     
        $producto->save();

		$producto = new Product();  
        $producto->nombre = 'Antigripal Pediátrica';    //string
        $producto->codigo = 'ANTIPE01';   //string
        $producto->unidad = 'INY';   //string
		$producto->requiereDescartable = '0';   //boolean
        $producto->dosis = 1;      //integer
        $producto->descartables = 0; //integer
     
        $producto->save();
        
    }
}
