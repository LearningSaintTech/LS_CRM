<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Honorarydoctorate;

class HonorarydoctorateController extends Controller
{
    public function notificationindex()
    {
        $honorarydoctorate = Honorarydoctorate::get();
        return view('honorary_doctorate.index', compact('honorarydoctorate'));
    }
}
