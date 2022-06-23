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
        Schema::create('package', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->integer('user_id');
            $table->integer('configuration_id');
            $table->string('period');
            $table->string('bandwidth');
            $table->dateTime('date_to_expire');
            $table->dateTime('expired_date')->default(date("Y-m-d H:i:s"));
            $table->integer('expiration_month_spread');
            $table->tinyInteger('is_expired')->default('0');
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
        Schema::dropIfExists('package');
    }
};
