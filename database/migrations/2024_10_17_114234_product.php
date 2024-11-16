<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Product_ID
            $table->string('name'); // Product_Name
            $table->string('type'); // Product_Type
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
