<?php

use App\Models\Admin\GeneralSettings;
use App\Models\Admin\FooterInformation;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Setting;

if (!function_exists('fileUpload')) {
    function fileUpload($img, $path, $user_file_name = null, $width = null, $height = null, $defaultFileName = null)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (isset($user_file_name) && $user_file_name != "" && file_exists($path . $user_file_name)) {
            unlink($path . $user_file_name);
        }
        // saving image in target path
        $imgName = $defaultFileName ? $defaultFileName . '.' . $img->getClientOriginalExtension() : uniqid() . time() . '.' . $img->getClientOriginalExtension();
        $imgPath = public_path($path . $imgName);
        // making image
        $makeImg = Image::make($img)->orientate();
        if ($width != null && $height != null && is_int($width) && is_int($height)) {
            $makeImg->fit($width, $height);
        }
        if ($makeImg->save($imgPath)) {
            return $imgName;
        }
        return false;
    }
}

function allsetting($array = null)
{
    if (!isset($array[0])) {
        $allsettings = Setting::get();
        if ($allsettings) {
            $output = [];
            foreach ($allsettings as $setting) {
                $output[$setting->slug] = $setting->value;
            }
            return $output;
        }
        return false;
    } elseif (is_array($array)) {
        $allsettings = Setting::whereIn('slug', $array)->get();
        if ($allsettings) {
            $output = [];
            foreach ($allsettings as $setting) {
                $output[$setting->slug] = $setting->value;
            }
            return $output;
        }
        return false;
    } else {
        $allsettings = Setting::where(['slug' => $array])->first();
        if ($allsettings) {
            $output = $allsettings->value;
            return $output;
        }
        return false;
    }
}




if (!function_exists('DriversPicture')) {
    function DriversPicture()
    {
        return 'uploaded_files/drivers_details/';
    }
}

if (!function_exists('AdminProfilePicture')) {
    function AdminProfilePicture()
    {
        return 'uploaded_files/admin_profile/';
    }
}


if (!function_exists('GeneralSettingsImage')) {
    function GeneralSettingsImage()
    {
        return 'uploaded_files/general_settings/';
    }
}
if (!function_exists('GeneralSettings')) {
    function GeneralSettings()
    {
        return GeneralSettings::first();
    }
}


if (!function_exists('footerInformation')) {
    function footerInformation()
    {
        return FooterInformation::first();
    }
}

if (!function_exists('footerImage')) {
    function footerImage()
    {
        return 'uploaded_files/footer/';
    }
}
