<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
        });

        DB::table('categories')->insert(
            array(
                [
                    'category_name' => 'Elektro',
                ],
                [
                    'category_name' => 'Domacnost',
                ],
                [
                    'category_name' => 'Zahrada',
                ],
                [
                    'category_name' => 'Auto',
                ],
                [
                    'category_name' => 'Zviera',
                ],
                [
                    'category_name' => 'Oblecenie',
                ],
                [
                    'category_name' => 'Ine',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
