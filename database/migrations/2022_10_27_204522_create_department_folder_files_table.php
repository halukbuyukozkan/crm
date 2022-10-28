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
        Schema::create('department_folder_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained();
            $table->foreignId('department_folder_id')->nullable()->constrained();

            $table->string('filename');

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
        Schema::dropIfExists('department_folder_files');
    }
};
