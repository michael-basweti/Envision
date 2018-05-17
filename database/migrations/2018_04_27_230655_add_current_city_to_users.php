<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrentCityToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('users', function ( $table) {
            
            $table->string('current_city');
           $table->string('home_town');          
           $table->string('Gender');
           $table->string('website');
          
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
             Schema::dropColumn('users', function ( $table) {
            
            $table->string('current_city');
           $table->string('home_town');          
           $table->string('Gender');
           $table->string('website');
          
           
        });
    }
}
