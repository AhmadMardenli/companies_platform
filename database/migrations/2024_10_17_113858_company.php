<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Company_ID
            $table->string('name'); // Company_Name
            $table->string('location'); // Company_Location
            $table->date('establishment_date'); // Establishment_Date
            $table->string('activity'); // Company_Activity
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
