<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditToUsers extends Migration
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
            
            $table->string('first_name');
           $table->string('second_name');          
           $table->longText('description');
           $table->date('year')->nullable();
           $table->integer('phone');
           $table->string('nick_name');
           
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
            
            $table->string('first_name');
           $table->string('second_name');          
           $table->longText('description');
           $table->date('year')->nullable();
           $table->integer('phone');
           $table->string('nick_name');
           
        });
    }
}
