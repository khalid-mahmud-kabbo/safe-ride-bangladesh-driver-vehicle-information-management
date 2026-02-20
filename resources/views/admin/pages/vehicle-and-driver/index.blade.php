@extends('admin.master', ['menu' => 'vehicle', 'submenu' => 'vehicle-and-drivers'])
@section('title', isset($title) ? $title : '')
@section('content')

    <div id="table-url" data-url="{{ route('admin.vehicle-and-drivers.index') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Vehicle And Driver Info List')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Vehicle And Driver Info List')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="item-title">
                    <div class="col-xs-6">
                        <a href="{{route('admin.vehicle-and-drivers.create')}}" class="btn btn-md btn-info">{{ __('Add Vehicle And Driver Info')}}</a>
                    </div>
                </div>
                <div class="customers__table">
                    <table id="detailsTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>{{ __('#')}}</th>
                            <th>{{ __('Photo')}}</th>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Phone')}}</th>
                            <th>{{ __('Licence No.')}}</th>
                            <th>{{ __('Reg. No.')}}</th>
                            <th>{{ __('NID No.')}}</th>
                            <th>{{ __('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('post_scripts')
        <script src="{{asset('backend/js/admin/datatables/driversandvehicledetails.js')}}"></script>
    @endpush
@endsection
