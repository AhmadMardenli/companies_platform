<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id(); // Distribution_ID
            $table->date('distribution_date'); // Distribution_Date
            $table->integer('quantity'); // Quantity_Distributed
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Product_ID
            $table->foreignId('source_branch_id')->constrained('branches')->onDelete('cascade'); // Source_Branch_ID
            $table->foreignId('destination_branch_id')->constrained('branches')->onDelete('cascade'); // Destination_Branch_ID
        });
    }
    public function down()
    {
        Schema::dropIfExists('distributions');
    }
};
