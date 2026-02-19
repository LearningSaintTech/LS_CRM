<?php

namespace App\Helpers;

use App\Models\Vendor;

class VendorHelper
{

    public static function getvendor(){
        $vendor = Vendor::where('status' ,1)->get();
        return $vendor;
    }

}
