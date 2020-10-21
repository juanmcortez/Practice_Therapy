<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();

            $table->string('attention', 64)->nullable();
            $table->string('group', 128)->nullable();
            $table->string('name', 256)->index();

            $table->dateTime('default_effective')->default('2000-01-01 00:00:00');
            $table->dateTime('default_termination')->default('2000-01-01 00:00:00');

            $table->boolean('participating')->default(false);
            $table->boolean('do_not_bill')->default(false);
            $table->boolean('do_not_import')->default(false);

            $table->string('cms_id', 64)->nullable();
            $table->string('payer_type', 128)->nullable();
            $table->string('x12_partner', 128)->nullable();
            $table->string('financial_class', 64)->default('commercial');
            $table->string('payment_code', 64)->default('payins');

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
        Schema::dropIfExists('insurances');
    }
}
