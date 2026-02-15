<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year');
            $table->foreignIdFor(\App\Models\Brand::class);
            $table->integer('karshenasi_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('models');
    }
};
