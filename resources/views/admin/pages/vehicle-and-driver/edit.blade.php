@extends('admin.master', ['menu' => 'vehicle', 'submenu' => 'vehicle-and-drivers'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{ __('Edit Vehicle And Driver Info') }}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Vehicle And Driver Info') }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">
                                        <form method="POST"
      action="{{ route('admin.vehicle-and-drivers.update', $edit->id) }}"
      enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $edit->id }}">

    <div class="card">
        <div class="card-header bg-light">
            <strong>Edit Vehicle & Driver</strong>
        </div>
        <div class="card-body">

            <div class="tab-content" id="formTabsContent">

                {{-- ================= DRIVER INFORMATION ================= --}}
                <div class="tab-pane fade show active" id="driver" role="tabpanel">
                    <h5>Driver Information</h5>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" required value="{{ $edit->name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Driver Photo</label>
                            <input type="file" name="photo" class="form-control">
                            @if($edit->photo)
                                <img src="{{ asset(DriversPicture() . $edit->photo) }}" width="80" class="mt-2">
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>NID Number</label>
                            <input type="text" name="nid_number" class="form-control" value="{{ $edit->nid_number }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>NID Image</label>
                            <input type="file" name="nid_image" class="form-control">
                            @if($edit->nid_image)
                                <img src="{{ asset(DriversPicture() . $edit->nid_image) }}" width="80" class="mt-2">
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone Number *</label>
                            <input type="text" name="phone_number" class="form-control" required value="{{ $edit->phone_number }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Alternative Phone</label>
                            <input type="text" name="phone_number_2" class="form-control" value="{{ $edit->phone_number_2 }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Father's Name</label>
                            <input type="text" name="fathers_name" class="form-control" value="{{ $edit->fathers_name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ $edit->date_of_birth ? \Carbon\Carbon::parse($edit->date_of_birth)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $edit->address }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Blood Group</label>
                            <input type="text" name="blood_group" class="form-control" value="{{ $edit->blood_group }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>License Number *</label>
                            <input type="text" name="license_number" class="form-control" required value="{{ $edit->license_number }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>License Issue Date</label>
                            <input type="date" name="issue_date" class="form-control" value="{{ $edit->issue_date ? \Carbon\Carbon::parse($edit->issue_date)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>License Valid Till</label>
                            <input type="date" name="valid_till" class="form-control" value="{{ $edit->valid_till ? \Carbon\Carbon::parse($edit->valid_till)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>License Image</label>
                            <input type="file" name="license_image" class="form-control">
                            @if($edit->license_image)
                                <img src="{{ asset(DriversPicture() . $edit->license_image) }}" width="80" class="mt-2">
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Issued By</label>
                            <input type="text" name="issued_by" class="form-control" value="{{ $edit->issued_by }}">
                        </div>

                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary next-tab">Next</button>
                    </div>
                </div>

                {{-- ================= VEHICLE INFORMATION ================= --}}
                <div class="tab-pane fade" id="vehicle" role="tabpanel">
                    <h5>Vehicle Information</h5>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Registration Number *</label>
                            <input type="text" name="registration_number" class="form-control" required value="{{ $edit->registration_number }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Date of Registration</label>
                            <input type="date" name="date_of_registration" class="form-control" value="{{ $edit->date_of_registration }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Vehicle Type *</label>
                            <input type="text" name="vehicle_type" class="form-control" required value="{{ $edit->vehicle_type }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Vehicle Registration Card Image</label>
                            <input type="file" name="vehicle_registration_card_image" class="form-control">
                            @if($edit->vehicle_registration_card_image)
                                <img src="{{ asset(DriversPicture() . $edit->vehicle_registration_card_image) }}" width="80" class="mt-2">
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Color</label>
                            <input type="text" name="color" class="form-control" value="{{ $edit->color }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>CC</label>
                            <input type="text" name="cc" class="form-control" value="{{ $edit->cc }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Fuel Type</label>
                            <input type="text" name="fuel_type" class="form-control" value="{{ $edit->fuel_type }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Seating Capacity</label>
                            <input type="text" name="seating_capacity" class="form-control" value="{{ $edit->seating_capacity }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Engine Number</label>
                            <input type="text" name="engine_number" class="form-control" value="{{ $edit->engine_number }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Chassis Number</label>
                            <input type="text" name="chassis_number" class="form-control" value="{{ $edit->chassis_number }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Hire</label>
                            <input type="text" name="hire" class="form-control" value="{{ $edit->hire }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Wheels</label>
                            <input type="text" name="wheels" class="form-control" value="{{ $edit->wheels }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Weight</label>
                            <input type="text" name="weight" class="form-control" value="{{ $edit->weight }}">
                        </div>

                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-secondary prev-tab">Previous</button>
                        <button type="button" class="btn btn-primary next-tab">Next</button>
                    </div>
                </div>

                {{-- ================= TAX TOKEN INFORMATION ================= --}}
                <div class="tab-pane fade" id="tax" role="tabpanel">
                    <h5>Tax Token Information</h5>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Tax Token Registration Date *</label>
                            <input type="date" name="tax_token_registration_date" class="form-control" required value="{{ $edit->tax_token_registration_date ? \Carbon\Carbon::parse($edit->tax_token_registration_date)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tax Token Number</label>
                            <input type="text" name="tax_token_number" class="form-control" value="{{ $edit->tax_token_number }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Transaction Number</label>
                            <input type="text" name="transaction_number" class="form-control" value="{{ $edit->transaction_number }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Issuing Bank Name</label>
                            <input type="text" name="issuing_bank_name" class="form-control" value="{{ $edit->issuing_bank_name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Issuing Bank Branch</label>
                            <input type="text" name="issuing_bank_branch_name" class="form-control" value="{{ $edit->issuing_bank_branch_name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Issuing Teller Name</label>
                            <input type="text" name="issuing_teller_name" class="form-control" value="{{ $edit->issuing_teller_name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Previous Expiry Date</label>
                            <input type="date" name="previous_expiry_date" class="form-control" value="{{ $edit->previous_expiry_date ? \Carbon\Carbon::parse($edit->previous_expiry_date)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Issuing Date</label>
                            <input type="date" name="issuing_date" class="form-control" value="{{ $edit->issuing_date ? \Carbon\Carbon::parse($edit->issuing_date)->format('Y-m-d') : '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tax Period</label>
                            <input type="text" name="tax_period" class="form-control" value="{{ $edit->tax_period }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Principal Amount *</label>
                            <input type="number" step="0.01" name="principal_amount" class="form-control" required value="{{ $edit->principal_amount }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>VAT Amount</label>
                            <input type="number" step="0.01" name="vat_amount" class="form-control" value="{{ $edit->vat_amount }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Fine</label>
                            <input type="number" step="0.01" name="fine" class="form-control" value="{{ $edit->fine }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Total Paid *</label>
                            <input type="number" step="0.01" name="total_paid" class="form-control" required value="{{ $edit->total_paid }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Tax Token Image</label>
                            <input type="file" name="tax_token_image" class="form-control">
                            @if($edit->tax_token_image)
                                <img src="{{ asset(DriversPicture() . $edit->tax_token_image) }}" width="80" class="mt-2">
                            @endif
                        </div>

                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-secondary prev-tab">Previous</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('post_scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const nextButtons = document.querySelectorAll('.next-tab');
        const prevButtons = document.querySelectorAll('.prev-tab');
        const tabs = ['driver','vehicle','tax'];
        let current = 0;

        nextButtons.forEach(btn => btn.addEventListener('click', () => {
            if(current < tabs.length-1){
                document.getElementById(tabs[current]).classList.remove('show','active');
                current++;
                document.getElementById(tabs[current]).classList.add('show','active');
            }
        }));

        prevButtons.forEach(btn => btn.addEventListener('click', () => {
            if(current > 0){
                document.getElementById(tabs[current]).classList.remove('show','active');
                current--;
                document.getElementById(tabs[current]).classList.add('show','active');
            }
        }));
    });
</script>
    @endpush
@endsection
