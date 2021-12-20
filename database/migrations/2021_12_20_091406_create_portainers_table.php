<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portainers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('url')->default('https://portainer.url');;
            $table->string('usr')->default('user');
            $table->string('pwd')->default('password');
            $table->string('end')->default('endpoint');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portainers');
    }
}
