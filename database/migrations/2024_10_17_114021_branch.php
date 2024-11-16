<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // Branch_ID
            $table->enum('type', ['primary', 'secondary']); // Branch_Type
            $table->string('name'); // Branch_Name
            $table->string('location'); // Branch_Location
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Company_ID
            $table->foreignId('major_branch_id')->nullable()->references('id')->on('branches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
