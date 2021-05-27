<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\routes;
class routesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso=new routes();
        //'idroutes ', 'Name_route', 'description'
        $curso->Name_route="Maravatio por charo";
        $curso->idroutes=null;
        $curso->description="Maravatio por charo es sin casetas";
        $curso->save();
        
        //routes::factory(50)->create(); no funciona :(


    }
}
