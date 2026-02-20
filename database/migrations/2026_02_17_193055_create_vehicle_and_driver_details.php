<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleAndDriverDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_and_driver_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->string('nid_number');
            $table->string('phone_number');
            $table->string('phone_number_2');
            $table->string('fathers_name');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('blood_group');
            $table->date('issue_date');
            $table->date('valid_till');
            $table->string('license_number');
            $table->string('license_image');
            $table->string('nid_image');
            $table->string('issued_by');
            $table->string('registration_number');
            $table->date('date_of_registration');
            $table->string('vehicle_type');
            $table->string('vehicle_registration_card_image');
            $table->string('color');
            $table->string('cc');
            $table->string('fuel_type');
            $table->string('seating_capacity');
            $table->string('engine_number');
            $table->string('chassis_number');
            $table->string('hire');
            $table->string('wheels');
            $table->string('weight');
            $table->date('tax_token_registration_date');
            $table->string('tax_token_number');
            $table->string('transaction_number');
            $table->string('issuing_bank_name');
            $table->string('issuing_bank_branch_name');
            $table->string('issuing_teller_name');
            $table->date('previous_expiry_date');
            $table->date('issuing_date');
            $table->string('tax_period');
            $table->string('principal_amount');
            $table->string('vat_amount');
            $table->string('fine');
            $table->string('total_paid');
            $table->string('tax_token_image');
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
        Schema::dropIfExists('vehicle_and_driver_details');
    }
}
