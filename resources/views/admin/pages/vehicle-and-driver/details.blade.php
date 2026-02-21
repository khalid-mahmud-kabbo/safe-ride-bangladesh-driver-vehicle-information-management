@extends('admin.master', ['menu' => 'vehicle', 'submenu' => 'vehicle-and-drivers'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{ __('View Vehicle And Driver Info') }}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('View Vehicle And Driver') }}</li>
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
                    <div class="d-flex gap-3">
                                <a href="{{route('admin.vehicle-and-drivers.qrcode', $detail->id)}}" class="btn btn-blue text-white next-tab">Print QR Code</a>
                                <a href="{{route('admin.vehicle-and-drivers.edit', $detail->id)}}" class="btn btn-success text-white next-tab">Edit Details</a>
                            </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            
                            <div class="row">
                                <div class="col-md-12">
                                            <div class="row">

        {{-- DRIVER INFORMATION --}}
        <div class="col-lg-6 mb-4">
            <div class="card shadow border-0 h-100">
                 <h2 class="card-header bg-dark text-white">
            👤 Driver Information
        </h2>
                <div class="card-body">

                    <div class="text-center mb-4">
                        <img src="{{ asset(DriversPicture() . $detail->photo) }}"
                             class="rounded-circle shadow"
                             width="140" height="140"
                             style="object-fit:cover;">
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $detail->name }}</li>
                        <li class="list-group-item"><strong>NID:</strong> {{ $detail->nid_number }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $detail->phone_number }}</li>
                        <li class="list-group-item"><strong>Alternate:</strong> {{ $detail->phone_number_2 }}</li>
                        <li class="list-group-item"><strong>License No:</strong> {{ $detail->license_number }}</li>
                        <li class="list-group-item"><strong>Issued By:</strong> {{ $detail->issued_by }}</li>
                        <li class="list-group-item"><strong>Issue Date:</strong> {{ $detail->issue_date }}</li>
                        <li class="list-group-item"><strong>Valid Till:</strong> 
                            <span class="badge bg-warning text-dark">
                                {{ $detail->valid_till }}
                            </span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        {{-- VEHICLE INFORMATION --}}
        <div class="col-lg-6 mb-4">
            <div class="card shadow border-0 h-100">
                <h2 class="card-header bg-dark text-white">
            🚙 Vehicle Information
        </h2>
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Registration No:</strong> {{ $detail->registration_number }}</li>
                        <li class="list-group-item"><strong>Date of Registration:</strong> {{ $detail->date_of_registration }}</li>
                        <li class="list-group-item"><strong>Tax Token No:</strong> {{ $detail->tax_token_number }}</li>
                        <li class="list-group-item"><strong>Tax Token Reg Date:</strong> {{ optional($detail->tax_token_registration_date)->format('d M Y') }}</li>
                        <li class="list-group-item"><strong>Previous Expiry:</strong> {{ optional($detail->previous_expiry_date)->format('d M Y') }}</li>
                        <li class="list-group-item"><strong>Issuing Date:</strong> {{ optional($detail->issuing_date)->format('d M Y') }}</li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

    {{-- DOCUMENT IMAGES SECTION --}}
    <div class="card shadow border-0 mt-4">
        <h2 class="card-header bg-dark text-white">
            📂 Documents & Images
        </h2>

        <div class="card-body">
            <div class="row g-4">

                @php
                    $images = [
                        'License Front' => $detail->front_license_image,
                        'License Back' => $detail->back_license_image,
                        'NID Front' => $detail->front_nid_image,
                        'NID Back' => $detail->back_nid_image,
                        'Reg Card Front' => $detail->front_vehicle_registration_card_image,
                        'Reg Card Back' => $detail->back_vehicle_registration_card_image,
                        'Tax Token' => $detail->tax_token_image,
                    ];
                @endphp

                @foreach($images as $label => $image)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">

                                <h6 class="mb-3">{{ $label }}</h6>

                                <img src="{{ asset(DriversPicture() . $image) }}"
                                     class="img-fluid rounded shadow-sm"
                                     style="object-fit:cover; width:100%;">

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
