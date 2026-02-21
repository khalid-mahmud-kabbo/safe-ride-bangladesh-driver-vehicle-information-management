<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\VehicleAndDriver;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleAndDriverController extends Controller
{

public function index(Request $request)
{
    if ($request->ajax()) {

        $data = VehicleAndDriver::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('photo', function ($data) {
                $url = asset(DriversPicture() . $data->photo);
                return '<img src="'.$url.'" width="70" class="img-thumbnail" />';
            })
            ->editColumn('name', function ($data) {
                return $data->name;
            })
            ->editColumn('phone_number', function ($data) {
                return $data->phone_number;
            })
            ->editColumn('license_number', function ($data) {
                return $data->license_number;
            })
            ->editColumn('registration_number', function ($data) {
                return $data->registration_number;
            })
            ->editColumn('nid_number', function ($data) {
                return $data->nid_number;
            })
            ->addColumn('action', function ($data) {
                $btn = '<div class="action__buttons">';
                
                $btn .= '<a href="' . route('admin.vehicle-and-drivers.details', $data->id) . '" class="btn-action">
                            <i class="fa-solid fa-eye"></i>
                        </a>';
                
                $btn .= '<a href="' . route('admin.vehicle-and-drivers.qrcode', $data->id) . '" class="btn-action">
                            <i class="fa-solid fa-qrcode"></i>
                        </a>';

                $btn .= '<a href="' . route('admin.vehicle-and-drivers.edit', $data->id) . '" class="btn-action">
                            <i class="fa-solid fa-pen-to-square"></i>
                         </a>';
                $btn .= '<a href="' . route('admin.vehicle-and-drivers.delete', $data->id) . '" 
                            class="btn-action delete">
                            <i class="fas fa-trash-alt"></i>
                         </a>';
                $btn .= '</div>';
                return $btn;
            })

            ->rawColumns(['photo', 'action'])
            ->make(true);
    }

    $data['title'] = __('Vehicle And Driver Info List');
    return view('admin.pages.vehicle-and-driver.index', $data);
}

    public function create()
    {
        $data['title'] = __('Add Vehicle And Driver Info');
        return view('admin.pages.vehicle-and-driver.create', $data);
    }


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'required|image|mimes:jpg,jpeg,png',
        'nid_number' => 'required|string|max:50',
        'phone_number' => 'required|string|max:20',
        'license_number' => 'required|string|max:100',
        'registration_number' => 'required|string|max:100',
        'tax_token_registration_date' => 'required|date',
    ]);

$photo = $request->hasFile('photo') ? fileUpload($request->photo, DriversPicture()) : null;
$front_license_image = $request->hasFile('front_license_image') ? fileUpload($request->front_license_image, DriversPicture()) : null;
$back_license_image = $request->hasFile('back_license_image') ? fileUpload($request->back_license_image, DriversPicture()) : null;
$front_nid_image = $request->hasFile('front_nid_image') ? fileUpload($request->front_nid_image, DriversPicture()) : null;
$back_nid_image = $request->hasFile('back_nid_image') ? fileUpload($request->back_nid_image, DriversPicture()) : null;
$front_vehicle_registration_card_image = $request->hasFile('front_vehicle_registration_card_image') ? fileUpload($request->front_vehicle_registration_card_image, DriversPicture()) : null;
$back_vehicle_registration_card_image = $request->hasFile('back_vehicle_registration_card_image') ? fileUpload($request->back_vehicle_registration_card_image, DriversPicture()) : null;
$tax_token_image = $request->hasFile('tax_token_image') ? fileUpload($request->tax_token_image, DriversPicture()) : null;


    $details = VehicleAndDriver::create([
        'name' => $request->name,
        'photo' => $photo,
        'nid_number' => $request->nid_number,
        'phone_number' => $request->phone_number,
        'phone_number_2' => $request->phone_number_2,
        'issue_date' => $request->issue_date,
        'valid_till' => $request->valid_till,
        'license_number' => $request->license_number,
        'front_license_image' => $front_license_image,
        'back_license_image' => $back_license_image,
        'front_nid_image' => $front_nid_image,
        'back_nid_image' => $back_nid_image,
        'front_vehicle_registration_card_image' => $front_vehicle_registration_card_image,
        'back_vehicle_registration_card_image' => $back_vehicle_registration_card_image,
        'issued_by' => $request->issued_by,
        'registration_number' => $request->registration_number,
        'date_of_registration' => $request->date_of_registration,
        'tax_token_registration_date' => $request->tax_token_registration_date,
        'tax_token_number' => $request->tax_token_number,
        'previous_expiry_date' => $request->previous_expiry_date,
        'issuing_date' => $request->issuing_date,
        'tax_token_image' => $tax_token_image,
    ]);

    if ($details) {
        return redirect()
            ->route('admin.vehicle-and-drivers.index')
            ->with('success', __('Info Successfully Stored!'));
    }

    return redirect()->back()->with('error', __('Something went wrong!'));
}



    public function edit($id)
    {
        $edit = VehicleAndDriver::where('id', $id)->first();
        $title = __('Edit Vehicle And Driver');
        return view('admin.pages.vehicle-and-driver.edit', compact('edit', 'title'));
    }
    


public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'license_number' => 'required|string|max:100',
        'registration_number' => 'required|string|max:100',
    ]);

    $vehicle = VehicleAndDriver::findOrFail($request->id);
    if ($request->hasFile('photo')) {
        if (file_exists(DriversPicture() . $vehicle->photo)) {
            @unlink(DriversPicture() . $vehicle->photo);
        }
        $vehicle->photo = fileUpload($request->photo, DriversPicture());
    }

    if ($request->hasFile('front_license_image')) {
        if (file_exists(DriversPicture() . $vehicle->front_license_image)) {
            @unlink(DriversPicture() . $vehicle->front_license_image);
        }
        $vehicle->front_license_image = fileUpload($request->front_license_image, DriversPicture());
    }
    if ($request->hasFile('back_license_image')) {
        if (file_exists(DriversPicture() . $vehicle->back_license_image)) {
            @unlink(DriversPicture() . $vehicle->back_license_image);
        }
        $vehicle->back_license_image = fileUpload($request->back_license_image, DriversPicture());
    }

    if ($request->hasFile('front_nid_image')) {
        if (file_exists(DriversPicture() . $vehicle->front_nid_image)) {
            @unlink(DriversPicture() . $vehicle->front_nid_image);
        }
        $vehicle->front_nid_image = fileUpload($request->front_nid_image, DriversPicture());
    }

    if ($request->hasFile('back_nid_image')) {
        if (file_exists(DriversPicture() . $vehicle->back_nid_image)) {
            @unlink(DriversPicture() . $vehicle->back_nid_image);
        }
        $vehicle->back_nid_image = fileUpload($request->back_nid_image, DriversPicture());
    }

    if ($request->hasFile('front_vehicle_registration_card_image')) {
        if (file_exists(DriversPicture() . $vehicle->front_vehicle_registration_card_image)) {
            @unlink(DriversPicture() . $vehicle->front_vehicle_registration_card_image);
        }
        $vehicle->front_vehicle_registration_card_image = fileUpload($request->front_vehicle_registration_card_image, DriversPicture());
    }

    if ($request->hasFile('back_vehicle_registration_card_image')) {
        if (file_exists(DriversPicture() . $vehicle->back_vehicle_registration_card_image)) {
            @unlink(DriversPicture() . $vehicle->back_vehicle_registration_card_image);
        }
        $vehicle->back_vehicle_registration_card_image = fileUpload($request->back_vehicle_registration_card_image, DriversPicture());
    }

    if ($request->hasFile('tax_token_image')) {
        if (file_exists(DriversPicture() . $vehicle->tax_token_image)) {
            @unlink(DriversPicture() . $vehicle->tax_token_image);
        }
        $vehicle->tax_token_image = fileUpload($request->tax_token_image, DriversPicture());
    }

    $vehicle->update([
        'name' => $request->name,
        'nid_number' => $request->nid_number,
        'phone_number' => $request->phone_number,
        'phone_number_2' => $request->phone_number_2,
        'issue_date' => $request->issue_date,
        'valid_till' => $request->valid_till,
        'license_number' => $request->license_number,
        'issued_by' => $request->issued_by,
        'registration_number' => $request->registration_number,
        'date_of_registration' => $request->date_of_registration,
        'tax_token_registration_date' => $request->tax_token_registration_date,
        'tax_token_number' => $request->tax_token_number,
        'previous_expiry_date' => $request->previous_expiry_date,
        'issuing_date' => $request->issuing_date
    ]);

    return redirect()->route('admin.vehicle-and-drivers.index')->with('success', __('Info Successfully Updated!'));
}



public function generateQrCode($id)
{
    $vehicle = VehicleAndDriver::findOrFail($id);

    $content = "
==============================
VEHICLE & DRIVER INFO
==============================

Name: {$vehicle->name}
NID: {$vehicle->nid_number}
Phone: {$vehicle->phone_number}
Alternate Phone: {$vehicle->phone_number_2}

License Number: {$vehicle->license_number}
Issued By: {$vehicle->issued_by}
Issue Date: {$vehicle->issue_date}
Valid Till: {$vehicle->valid_till}

Registration Number: {$vehicle->registration_number}
Date of Registration: {$vehicle->date_of_registration}

Tax Token Registration Date: {$vehicle->tax_token_registration_date}
Tax Token Number: {$vehicle->tax_token_number}
Expiry Date: {$vehicle->previous_expiry_date}
Issuing Date: {$vehicle->issuing_date}

Photo: " . asset(DriversPicture().$vehicle->photo) . "
Driving License Card(front): " . asset(DriversPicture().$vehicle->front_license_image) . "
Driving License Card(back): " . asset(DriversPicture().$vehicle->back_license_image) . "
NID Card(front): " . asset(DriversPicture().$vehicle->front_nid_image) . "
NID Card(back): " . asset(DriversPicture().$vehicle->back_nid_image) . "
Vehicle Registration Card(front): " . asset(DriversPicture().$vehicle->front_vehicle_registration_card_image) . "
Vehicle Registration Card(back): " . asset(DriversPicture().$vehicle->back_vehicle_registration_card_image) . "
Tax Token Image: " . asset(DriversPicture().$vehicle->tax_token_image) . "

==============================
Thanks.
==============================
";

    $qrSvg = QrCode::size(1000)->errorCorrection('L')->margin(2)->generate($content);

    return view('admin.pages.vehicle-and-driver.qrcode-print', compact('qrSvg'));
}




    public function details($id)
    {
        $detail = VehicleAndDriver::where('id', $id)->first();
        $title = __('Vehicle And Driver Information Details');
        return view('admin.pages.vehicle-and-driver.details', compact('detail', 'title'));
    }



    

        public function delete($id)
    {

        $delete = VehicleAndDriver::Where('id', $id);
        if ($delete) {
            $delete->delete();
            return redirect()->route('admin.vehicle-and-drivers.index')->with('success', __('Info Successfully Deleted !'));
        }
        return redirect()->route('admin.vehicle-and-drivers.index')->with('error', __('Does Not Delete!'));
    }
}
