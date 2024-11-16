<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->id(); // Distribution_ID
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Product_ID
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade'); // Source_Branch_ID
            $table->integer('quantity');// the quantity the branch has
        });
    }
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
};
