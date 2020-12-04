<?php

use Illuminate\Database\Seeder;
use App\Tos;
class TosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tos = new Tos();
        $tos->name = "Base de datos pública";
        $tos->name_en = "Public access data";
        $tos->text = "Base de datos pública";
        $tos->text_en = "Public access data";
        $tos->save();

        $tos = new Tos();
        $tos->name = "Datos acceso restringido";
        $tos->name_en = "Restricted Data";
        $tos->text = "Datos acceso restringido";
        $tos->text_en = "Restricted Data";
        $tos->save();

        $tos = new Tos();
        $tos->name = "Datos disponibles en repositorio exterior";
        $tos->name_en = "Data available in foreign repository";
        $tos->text = "Datos disponibles en repositorio exterior";
        $tos->text_en = "Data available in foreign repository";
        $tos->save();

        $tos = new Tos();
        $tos->name = "Disponible en sala";
        $tos->name_en = "Data avaialble in room";
        $tos->text = "Disponible en sala";
        $tos->text_en = "Data avaialble in room";
        $tos->save();

    }
}
