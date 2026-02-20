<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAndDriver extends Model
{
    use HasFactory;

    protected $table = 'vehicle_and_driver_details';

    protected $fillable = [
        'name',
        'photo',
        'nid_number',
        'phone_number',
        'phone_number_2',
        'issue_date',
        'valid_till',
        'license_number',
        'front_license_image',
        'back_license_image',
        'front_nid_image',
        'back_nid_image',
        'front_vehicle_registration_card_image',
        'back_vehicle_registration_card_image',
        'issued_by',
        'registration_number',
        'date_of_registration',
        'tax_token_registration_date',
        'tax_token_number',
        'previous_expiry_date',
        'issuing_date',
        'tax_token_image'
    ];

    protected $casts = [
        'tax_token_registration_date' => 'date',
        'previous_expiry_date' => 'date',
        'issuing_date' => 'date',
    ];
}
