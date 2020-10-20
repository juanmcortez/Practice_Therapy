<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_insurance', function (Blueprint $table) {

            $table->unsignedBigInteger('insurance_id')->index();
            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('cascade');

            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

            $table->primary(['insurance_id', 'address_id']);

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
        Schema::dropIfExists('address_insurance');
    }
}
