<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id(); // Production_ID
            $table->integer('quantity'); // Quantity
            $table->date('production_date'); // Production_Date
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Product_ID
            $table->foreignId('branch_id')->constrained()->onDelete('cascade'); // Branch_ID
        });
    }

    public function down()
    {
        Schema::dropIfExists('productions');
    }
};
