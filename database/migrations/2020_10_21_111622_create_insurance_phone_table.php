<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_phone', function (Blueprint $table) {

            $table->unsignedBigInteger('insurance_id')->index();
            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('cascade');

            $table->unsignedBigInteger('phone_id')->index();
            $table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');

            $table->primary(['phone_id', 'insurance_id']);

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
        Schema::dropIfExists('insurance_phone');
    }
}
