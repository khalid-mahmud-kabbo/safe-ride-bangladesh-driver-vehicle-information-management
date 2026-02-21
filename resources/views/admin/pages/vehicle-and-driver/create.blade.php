@extends('admin.master', ['menu' => 'vehicle', 'submenu' => 'create-vehicle-and-driver'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{ __('Add Vehicle And Driver Info') }}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Vehicle And Driver') }}</li>
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
      action="{{ route('admin.vehicle-and-drivers.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="tab-content" id="formTabsContent">

                {{-- ================= DRIVER INFORMATION ================= --}}
                <div class="tab-pane fade show active" id="driver" role="tabpanel">
                    <div class="mb-4">
                        <h2>Driver Information</h2>
                        <hr>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
                        </div>
                        </div>
                    

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Driver Photo') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage1" id="photo" name="photo">
                                <img src="" id="target1"/>
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('NID Number') }} <span class="text-danger">*</span></label>
                                <input type="number" id="nid_number" name="nid_number" value="{{ old('nid_number') }}" placeholder="NID Number">
                        </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                <input type="number" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number">
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Alternative Phone') }} <span class="text-danger">*</span></label>
                                <input type="number" id="phone_number_2" name="phone_number_2" value="{{ old('phone_number_2') }}" placeholder="Alternative Phone Number">
                        </div>
                        </div>




                        
                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('License Number') }} <span class="text-danger">*</span></label>
                                <input type="text" id="license_number" name="license_number" value="{{ old('license_number') }}" placeholder="Driving License Number">
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('License Issue Date') }} <span class="text-danger">*</span></label>
                                <input type="date" id="issue_date" name="issue_date" value="{{ old('issue_date') }}">
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('License Valid Till') }} <span class="text-danger">*</span></label>
                                <input type="date" id="valid_till" name="valid_till" value="{{ old('valid_till') }}">
                        </div>
                        </div>


                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Driving License Image (Front)') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage2" id="front_license_image" name="front_license_image">
                                <img src="" id="target2"/>
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Driving License Image (Back)') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage3" id="back_license_image" name="back_license_image">
                                <img src="" id="target3"/>
                        </div>
                        </div>


                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('NID Image (Front)') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage4" id="front_nid_image" name="front_nid_image">
                                <img src="" id="target4"/>
                        </div>
                        </div>


                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('NID Image (Back)') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage5" id="back_nid_image" name="back_nid_image">
                                <img src="" id="target5"/>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary text-white next-tab">Next</button>
                    </div>
                </div>

                {{-- ================= VEHICLE INFORMATION ================= --}}
                <div class="tab-pane fade" id="vehicle" role="tabpanel">
                     <div class="mb-4">
                        <h2>Vehicle Information</h2>
                        <hr>
                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Registration Number') }} <span class="text-danger">*</span></label>
                                <input type="text" id="registration_number" name="registration_number" value="{{ old('registration_number') }}" placeholder="Registration Number">
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Date of Registration') }} <span class="text-danger">*</span></label>
                                <input type="date" id="date_of_registration" name="date_of_registration">
                        </div>
                        </div>



                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Vehicle Registration Card Image (Front)') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage6" id="front_vehicle_registration_card_image" name="front_vehicle_registration_card_image">
                                <img src="" id="target6"/>
                        </div>
                        </div>


                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Vehicle Registration Card Image (Back)') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage7" id="back_vehicle_registration_card_image" name="back_vehicle_registration_card_image">
                                <img src="" id="target7"/>
                        </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-secondary text-white prev-tab">Previous</button>
                        <button type="button" class="btn btn-primary text-white next-tab">Next</button>
                    </div>
                </div>

                {{-- ================= TAX TOKEN INFORMATION ================= --}}
                <div class="tab-pane fade" id="tax" role="tabpanel">
                    <div class="mb-4">
                        <h2>Tax Token Information</h2>
                        <hr>
                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Date of Tax Token Registration') }} <span class="text-danger">*</span></label>
                                <input type="date" id="tax_token_registration_date" name="tax_token_registration_date">
                        </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Tax Token Number') }} <span class="text-danger">*</span></label>
                                <input type="text" id="tax_token_number" name="tax_token_number" value="{{ old('tax_token_number') }}" placeholder="Tax Token Number">
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Expiry Date') }} <span class="text-danger">*</span></label>
                                <input type="date" id="previous_expiry_date" name="previous_expiry_date">
                        </div>
                        </div>


                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Issuing Date') }} <span class="text-danger">*</span></label>
                                <input type="date" id="issuing_date" name="issuing_date">
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Tax Token Image') }} <span class="text-danger">*</span></label>
                                <input type="file" class="form-control putImage8" id="tax_token_image" name="tax_token_image">
                                <img src="" id="target8"/>
                        </div>
                        </div>

                         <div class="col-md-6 mb-3">    
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">{{ __('Issued By') }} <span class="text-danger">*</span></label>
                                <input type="text" id="issued_by" name="issued_by" value="{{ old('issued_by') }}" placeholder="Issued By">
                        </div>
                        </div>



                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-secondary text-white prev-tab">Previous</button>
                        <button type="submit" class="btn btn-success text-white">Submit</button>
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
