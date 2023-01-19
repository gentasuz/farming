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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->string('column_number')->nullable($value = true);
            $table->string('name')->nullable($value = true);
            $table->year('year')->nullable($value = true);
            $table->string('crop')->nullable($value = true);
            $table->float('area',5,1)->nullable($value = true);
            $table->bigInteger('weed')->nullable($value = true);
            $table->text('comment')->nullable($value = true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
};
