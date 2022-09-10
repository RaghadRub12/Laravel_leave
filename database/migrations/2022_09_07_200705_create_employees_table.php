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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('email');
            $table->text('address');
            $table->enum('gender', ['male', 'female','other'])->default('female');
            $table->Integer('phone_no');
            $table->timestamp('start_joining_date');
            $table->unsignedBigInteger('department_id');
            $table-> foreign('department_id')->references('id')->on('departments')->cascadeOnDelete();
           
            $table->text('is_admin');
            $table->enum('emp_type', ['full_time', 'part-time','independent_contract'])->default('full_time');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
