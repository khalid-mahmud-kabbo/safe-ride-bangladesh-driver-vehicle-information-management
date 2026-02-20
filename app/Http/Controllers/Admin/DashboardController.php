<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DashboardRepository;
use Illuminate\Http\Request;
use App\Models\Admin\VehicleAndDriver;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function Dashboard()
{
    if (Auth::check()) {

        // Total Vehicle (registration_number not null)
        $data['total_vehicle'] = VehicleAndDriver::whereNotNull('registration_number')->count();

        // Total Driver (license_number not null)
        $data['total_driver'] = VehicleAndDriver::whereNotNull('license_number')->count();

        // Total QR Code (total records)
        $data['total_qr'] = VehicleAndDriver::count();

        $data['title'] = __('Dashboard');

        return view('admin.pages.dashboard', $data);
    }

    return redirect()->route('login')->with('error', __('Wrong Credential'));
}

}
