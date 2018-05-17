<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvatarToPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: table('photos', function($table){
            $table->string('avatar')->default('default.jpg');
            $table->string('name');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:: dropColumn('photos', function($table){
            $table->string('avatar')->default('default.jpg');
            $table->string('name');
        });
    }
}
