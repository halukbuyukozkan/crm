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
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('transection_category_id')->nullable()->constrained();

            $table->string('name');
            $table->text('description');
            $table->string('payer')->nullable();
            $table->string('payee')->nullable();
            $table->string('type');
            $table->integer('price');
            $table->boolean('is_income')->nullable();
            $table->string('status')->default('beklemede');

            $table->date('approved_at')->nullable();
            $table->date('completed_at')->nullable();
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
