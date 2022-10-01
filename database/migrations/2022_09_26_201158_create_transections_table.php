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
        Schema::create('transections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreignId('category_id')->nullable();

            $table->string('payer')->nullable();
            $table->string('payee')->nullable();
            $table->string('type');
            $table->integer('price');
            $table->boolean('is_income')->nullable();
            $table->string('status')->default('beklemede');

            $table->date('completed_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transections');
    }
};
