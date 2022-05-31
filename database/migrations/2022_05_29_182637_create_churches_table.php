<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abreviation')->nullable();
            $table->string('pastor_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('logo_url')->nullable();
            $table->enum('status',['ONLINE','OFFLINE'])->default('OFFLINE');    ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('churches');
    }
};
