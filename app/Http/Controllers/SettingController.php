<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function settingIndex()
    {
        return view('setting.index');
    }
}
